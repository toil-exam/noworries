$(function(){
//jquery startup! ignore indent since wrapping full document

//FUNCTION BLOCK START

//overwrite text of div mainText
function theText(x){
	$("#mainText").text(x);
}

//return an array [0,1,2...49,50,51]
function newDeck(){
	return [...Array(52).keys()];
}

//return rank int
function rank(card){
	return card % 13;
}

//return suit int
function suit(card){
	return Math.floor(card / 13);
}

//return rank string
function rankOf(card){
	ranks = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"];
	return ranks[rank(card)];
}

//return suit special char string
function suitOf(card){
	suits = ["&clubs;","&hearts;","&spades;","&diams;"];
	return suits[suit(card)];
}

//return color of card
function colorOf(card){
	return (suit(card)==0||suit(card)==2) ? "black" : "red";
}

//shuffle the thing
function shuffle(thing){
	//fisher-yates
	var x = thing.length;
	var temp, rando;
	while(0 !== x){
		rando = Math.floor(Math.random() * x);
		x--;
		//three point turn
		temp = thing[x];
		thing[x] = thing[rando];
		thing[rando] = temp;
	}
	return thing;
}

//return a players name
function playerName(player){
	var name = ["User","West","North","East"];
	return name[player];
}

//FUNCTION BLOCK END

//main card game class
class Espionage {
	constructor(){
		this.winner=null;
		this.leader=0;
		this.currentPlayer=0;
		this.player=[];
		for (var p=0;p<4;p++){
			this.player[p] = {hand:[],play:null,take:[],team:null,gameScore:0,sessionScore:0};
		}
	}
	
	
	updateGUI(){
		//USER
		var color = colorOf(this.player[0].team);
		var currentScore = 0;
		for(var c=0;c<this.player[0].take.length;c++){
			if(suit(this.player[0].team) === suit(this.player[0].take[c])){
				currentScore++;
			}
		}
		var scoreText = "<center>User";
		if(this.player[0].sessionScore > 0){
			scoreText += " (" + this.player[0].sessionScore.toString() +")";
		}
		scoreText += "<br/>\n<table>\n<tr>\n";
		scoreText += "<td class=\"" + color + "\">" + this.player[0].take.length/4 + "</td>\n";
		scoreText += "<td class=\"" + color + "\">+</td>\n";
		scoreText += "<td class=\"" + color + "\">" + suitOf(this.player[0].team) + "<br/>" +currentScore+ "</td>\n";
		scoreText += "<td class=\"" + color + "\">=</td>\n";
		scoreText += "<td class=\"" + color + "\">" + ((this.player[0].take.length/4) + currentScore).toString() + "</td>\n";
		scoreText += "</tr>\n</table>\n<span class=\"showRules\">-Rules-</span></center>\n";
		$("#player0play").html(scoreText);
		$(".showRules").click(function(){
			$("#rules").show(1000);
		});
		
		if(this.player[0].hand.length > 0){
			var handText = "<center><table>\n<tr>\n";
			for (var c=0;c<this.player[0].hand.length;c++){
				var card = this.player[0].hand[c];
				handText += "<td class=\"" + colorOf(card) + "\" id=\"card" + card.toString() + "\">";
				handText += rankOf(card).toString() + "<br/>" + suitOf(card).toString() + "</td>\n";
			}
			handText += "</tr>\n</table>\n</center>\n";
			$("#player0").html(handText);
		}
		else{
			$("#player0").html("");
		}

		//PLAYERP
		for(var p=1;p<4;p++){
			//color = colorOf(this.player[p].team);
			color = "black";
			currentScore = 0;
			for(var c=0;c<this.player[p].take.length;c++){
				if(suit(this.player[p].team) === suit(this.player[p].take[c])){
					currentScore++;
				}
			}
			var text = "<center>" + playerName(p);
			if(this.player[p].sessionScore > 0){
				text += " (" + this.player[p].sessionScore.toString() + ")";
			}
			text += "<br/>\n<table><tr>\n";
			text += "<td class=\"" + color + "\">" + this.player[p].take.length/4 + "</td>\n";
			text += "<td class=\"" + color + "\">+</td>\n";
			//text += "<td class=\"" + color + "\">" + currentScore + "</td>\n";
			text += "<td class=\"" + color + "\">?</td>\n";
			text += "<td class=\"" + color + "\">=</td>\n";
			//text += "<td class=\"" + color + "\">" + ((this.player[p].take.length/4) + currentScore).toString() + "</td>\n";
			text += "<td class=\"" + color + "\">?</td>\n";
			text += "</tr></table></center>\n";
			$("#player" + p.toString()).html(text);
			
			var card = this.player[p].play;
			var playText = "";
			if (card !== null){
				playText += "<center><table>\n<tr>\n";
				playText += "<td class=\"" + colorOf(card) + "\">";
				playText += rankOf(card) + "<br/>" + suitOf(card) + "</td>\n</tr>\n</table>\n</center>\n";
			}
			$("#player" + p.toString() + "play").html(playText);
			
		}
		
		
		if(this.currentPlayer === 0){
			if(this.player[0].hand.length > 0){
				//alert("URTURNBOSS");
				$("td").click(function(){
					var tempid = $(this).attr("id");
					if (tempid.slice(0,4) === "card"){
						var card = parseInt(tempid.slice(4));
						//alert(rankOf(card) + " of " + suitOf(card));
						userInput(card);
					}
				});
			}
			else{
				//if it's your turn and you have no cards in hand
				//that means the game is over, display scores etc
				var text = "<center><table>\n";
				for (var p=0;p<4;p++){
					var color = colorOf(this.player[p].team);
					var r = this.player[p].take.length / 4;
					var x = 0;
					for(var c=0;c<this.player[p].take.length;c++){
						if(suit(this.player[p].team) == suit(this.player[p].take[c])){
							x++;
						}
					}
					text += "<tr>\n";
					text += "<td class=\"" + color + "\">" + playerName(p) + "</td>\n";
					text += "<td class=\"" + color + "\">" + r.toString() + "Rnds</td>\n";
					text += "<td class=\"" + color + "\"> + </td>\n";
					text += "<td class=\"" + color + "\">" + x.toString() + "" + suitOf(this.player[p].team) + "</td>\n";
					text += "<td class=\"" + color + "\"> = </td>\n";
					text += "<td class=\"" + color + "\">" + (r+x).toString() + "Pts</td>\n";
					text += "<td class=\"" + color + "\">=></td>\n";
					text += "<td class=\"" + color + "\">(" + this.player[p].sessionScore + ")</td>\n";
					text += "</tr>\n";
				}
				text += "</table><br/>\n";
				text += "<table><tr><td class=\"black\">" + playerName(this.winner) + " Wins!</td></tr></table>(Click to Continue)</center>\n";
				theText("");
				$("#menu").html(text);
				$("#menu").show(1000);
				$("#menu").click(function(){
					userReDeal();
				});
			}
		}
	//end gui
	}
	
	
	deal(){
		$("#menu").hide(1000);
		setTimeout(function(){$("#menu").html("")},2000);
		theText("");
		for (var p=0;p<4;p++){
			this.player[p].hand = [];
			this.player[p].play = null;
			this.player[p].take = [];
			this.player[p].team = null;
			this.player[p].gameScore = 0;
		}
		var deck = newDeck();
		//pull out aces and distribute to determine teams
		var teams = [];
		for (var x=4;x>0;x--){
			var temp = (x*13)-1;
			teams[x-1] = deck.splice(temp,1);
		}
		shuffle(teams);
		for (var x=0;x<4;x++){
			this.player[x].team = teams.pop();
		}
		//deal out the rest of the deck
		shuffle(deck);
		for (var r=0;r<12;r++){
			for(var x=0;x<4;x++){
				this.player[x].hand[r] = deck.pop();
				//sort on last card dealt
				if(r==11){
					this.player[x].hand.sort(function(a,b){return a-b});
				}
			}
		}
		if (this.winner != null){
			this.leader = this.winner;
		}
		this.updateGUI();
		
		//redeal ai game lead play etc
		if(this.leader !== 0){
			var leadCard = null;
			for(var p=this.leader;p<4;p++){
				this.currentPlayer = p;
				this.aiTurn(p,leadCard);
				if(p===this.leader){
					leadCard = this.player[p].play;
				}
			}
			this.currentPlayer = 0;
			this.updateGUI();
			//theText("User's turn");
		}
		else{
			//theText("User leads");
		}
		theText("User's turn");
	}
	
	
	
	
	runGM(){
		//alert("GMINDAHOUSE");
		//user has just played a card and then calls this function due to it???
		var leadCard = this.player[this.leader].play;
		for(var p=1;p<4;p++){
			if (this.player[p].play === null){
				this.aiTurn(p,leadCard);
				var card = this.player[p].play;
				if(suit(leadCard) == suit(card) && rank(leadCard) < rank(card)){
					leadCard = card;
				}
			}
			else{
				break;
			}
		}
		//at this point every player has played, cleanup round
		var tempwinner=this.leader;
		
		for(var p=0;p<4;p++){
			if(suit(this.player[p].play)===suit(leadCard) && rank(this.player[p].play) > rank(this.player[tempwinner].play)){
				tempwinner=p;
				//alert("Player " + tempwinner.toString() + " has won round");
			}
		}
		theText(playerName(tempwinner) + " takes round");
		for(var p=0;p<4;p++){
			this.player[tempwinner].take[this.player[tempwinner].take.length] = this.player[p].play;
			this.player[p].play=null;
			this.updateGUI();
		}
		
		this.leader = tempwinner;
		leadCard = null;
		
		if(this.player[this.leader].hand.length > 0){
			if(this.leader !== 0){
				for(var p=this.leader;p<4;p++){
					this.currentPlayer = p;
					this.aiTurn(p,leadCard);
					if(p===this.leader){
						leadCard = this.player[p].play;
					}
				}
			}
		}
		else{
			for(var p=0;p<4;p++){
				var score = this.player[p].take.length / 4;
				for(var c=0;c<this.player[p].take.length;c++){
					if(suit(this.player[p].team) == suit(this.player[p].take[c])){
						score++;
					}
				}
				this.player[p].gameScore = score;
				this.player[p].sessionScore += score;
			}
			var winner = 0;
			for(var p=1;p<4;p++){
				if(this.player[p].gameScore > this.player[winner].gameScore){
					winner = p;
				}
			}
			this.winner = winner;
			//theText(playerName(winner) + " wins!");
		}
		
		
		this.currentPlayer = 0;
		this.updateGUI();
	}
	
	aiTurn(ai,leadCard=null){
		//need to add like a 1 sec wait
		//alert("player " + ai.toString() + " turn");
		var card = null;
		if(this.leader==ai){
			shuffle(this.player[ai].hand);
			this.player[ai].hand.sort(function(a,b){return rank(a)-rank(b)});
			card = this.player[ai].hand[0];
		}
		else {
			for(var p=0;p<4;p++){
				if((this.player[p].play !== null) && ((suit(this.player[p].play) == suit(leadCard)) && (rank(this.player[p].play) > rank(leadCard)))){
					leadCard = this.player[p].play;
				}
			}
			var onSuit = this.player[ai].hand.filter(function(card){return (suit(card) == suit(leadCard) && rank(card) > rank(leadCard))});
			if (onSuit.length>0){
				onSuit.sort(function(a,b){return a-b});
				//alert("onSuit " + onSuit.toString());
				card = onSuit[0];
			}
			if(card === null){
				shuffle(this.player[ai].hand);
				this.player[ai].hand.sort(function(a,b){return rank(a)-rank(b)});
				card = this.player[ai].hand[0];
			}
		}
		if(card !== null){
			this.playCard(card);
			this.player[ai].hand.sort(function(a,b){return a-b});
		}
		else{
			alert("WHOANELLY");
		}
	}
	
	
	//input raw card number, seek p player and c card-in-hand-postion 
	playCard(card){
		//alert("IMAPLAYINMAHCARD");
		
		//alert(rankOf(card) + " of " + suitOf(card));
		var tempc = null;
		var tempp = null;
		
		for (var p=0;p<4;p++){
			if (this.player[p].hand.indexOf(card)>=0){
				tempp = p;
				tempc = this.player[p].hand.indexOf(card);
				break;
			}
		}
		
		if (tempp !== null){
			//tempc = this.player[tempp].hand.indexOf(card);
		}
		else{
			alert("WHOATHERE");
		}
		
		this.player[tempp].play = this.player[tempp].hand.splice(tempc,1);
		this.updateGUI();
		
	}
	
//end of class
}



//LETSFIREHERUPPPPP
let newGame = new Espionage();

newGame.deal();

function userInput(card){
	//alert("clickclick");
	newGame.playCard(card);
	newGame.currentPlayer=1;
	newGame.runGM();	
}

function userReDeal(){
	newGame.deal();
}

$("#rules").click(function(){
	$("#rules").hide(1000);
});

//jquery end, ignore indent since wrapping full document
})