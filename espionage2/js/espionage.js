

import { GM } from "/espionage2/js/gm.js";
import { GUI } from "/espionage2/js/gui.js";
import { AI } from "/espionage2/js/ai.js";
import { ScoreCard } from "/espionage2/js/score.js";
import { Card } from "/espionage2/js/card.js";



class Espionage {
	constructor() {
		console.log("E S P I O N A G E")

		this.gui = new GUI(this);
		this.ai = new AI(this);
		this.score = null;

		//this.leader = 0;
		this.currentPlayer = 0; // 0 is user
		
		this.player = [];

		for (let p = 0; p < 4; p++){
			this.player[p] = {
				hand: [],
				play: null,
				take: [],
				team: null,
				gameScore: 0,
				sessionScore: 0
			};
		}

		//this.reset("rules"); // reset to rules screen on load
	}


	update() {
		console.log("U P D A T E");
		if (this.score === null) {
			this.reset();
		}
	}


	reset(input = "game") {
		console.log("R E S E T : " + input);
		this.score = new ScoreCard();
		this.deal();
		//if (input)
		//	this.gui.toggleScreen(input);

		this.passTurn();
	}


	deal() {
		console.log("D E A L");
		// aces first
		let aces = [];
		let card;
		for (let a of GM.aces) {
			card = new Card(a);
			aces.push(card);
		}
		aces = GM.shuffle(aces);
		for (let a = 0; a < 4; a++) {
			card = aces.pop();
			this.player[a].hand.push(card);
			this.player[a].team = card.color; 
		}
		// everything else
		let deck = [];
		for (let c of GM.nonAces) {
			deck.push(new Card(c));
		}
		deck = GM.shuffle(deck);
		for (let c = 4; c < 52; c++) {
			let card = deck.pop();
			let p = c % 4;
			this.player[p].hand.push(card);
		}

		for (let p = 0; p < 4; p++) { // sort hands ?? 
			this.player[p].hand = this.player[p].hand.sort(({x:a}, {x:b}) => a - b);
		}

		this.check();
		this.gui.updateHand();
		this.gui.updateScore();
	}


	passTurn() {
		let from = this.currentPlayer;
		this.iteratePlayer();
		let to = this.currentPlayer;
		console.log("P A S S _ T U R N : " + from + " -> " + to);

		if (this.currentRound().length === 4) { // all players have played
			this.resolveRound();
		}

		if (this.currentPlayer > 0)
			this.playAI();
		else if (this.currentPlayer === 0)
			this.gui.activatePlayerHand();	

	}

	currentRound() {
		//console.log("C U R R E N T _ R O U N D");
		let output = [];
		let card = null;
		let p = this.currentPlayer;

		for (let x = 4; x > 0; x--) { // construct the round by working backwards from current player
			p--;
			if (p < 0)
				p += 4;
			card = this.player[p].play; 
			if (card)
				output.unshift(card); // beginning of array
			else // null ie empty
				break;
		}

		//console.log(output);

		return output;
	}

	currentLead() {
		return GM.compare(...this.currentRound());
	}

	playAI() {
		let p = this.currentPlayer;
		console.log("P L A Y _ A I : " + p + " ( " + GM.players[p] + " )");
		this.check();
		
		let card = this.ai.play(this.currentLead(), this.player[p].hand);

		this.playCard(p, card);

		this.check();

		//this.passTurn();
	}

	playUser(card) {
		console.log("U S E R _ P L A Y")
		// ????
		this.gui.deactivatePlayerHand();
		this.playCard(0, card);
		this.gui.updateHand();
		this.check();
		//this.passTurn();
	}

	playCard(p, card) {
		if (!card)
			return;
		console.log("P L A Y _ C A R D : " + card.x + " ( " + card.RankOfSuit + " )");
		this.player[p].play = card; // put it in the play zone
		let i = this.player[p].hand.length;
		
		while(i--) {
			if (this.player[p].hand[i].hasOwnProperty("x") && this.player[p].hand[i].x === card.x) {
				this.player[p].hand.splice(i,1); // remove it from the hand zone
				this.gui.animatePlay(p, card);
				break;
			}
		}
	}


	resolveRound() {
		console.log("R E S O L V E _ R O U N D");
		let win = GM.compare(...this.currentRound());
		console.log(win);
		let winner = null;

		for (let p = 0; p < 4; p++) {
			if (win.x === this.player[p].play.x) {
				winner = p;
				console.log("R O U N D _ W I N N E R : " + winner);
				break;
			}
		}

		if (winner !== null) {
			for (let p = 0; p < 4; p++) {
				let card = this.player[p].play;

				if (card.rank === 12) { // you can't lose your ace 
					this.player[p].take.push(card);
				} else {
					this.player[winner].take.push(card);
				}

				this.player[p].play = null;
			}
		} else {
			console.log("? ? ? _ N O _ W I N N E R _ ? ? ? ")
		}

		this.currentPlayer = winner;
		
		this.gui.clearTable();
		this.gui.updateScore();
	}



	iteratePlayer() {
		let from = this.currentPlayer;
		
		this.currentPlayer++;
		if (this.currentPlayer > 3)
			this.currentPlayer -= 4;

		let to = this.currentPlayer;
		
		console.log("I T E R A T E _ P L A Y E R : " + from + " -> " + to);
	}

	check() {
		console.log(this);
	}

}




$(document).ready(function(){
	//jquery startup! on loaded start essentially 
	const game = new Espionage();
});


