//game class???


class Game(){

	constructor(players=4,territories=4,hand=9){
		//setup and deal
		//deck is the only zone that needs to be a dedicated object, other zones can just be [] for the ole push pop and even then...
		//players are just complex zones? yeah? i don't think players need to be dedicated objects either
		this.deck = new Deck();
		
		this.player=[];
		for(i=0,i<players;i++){
			this.player.push({"play":[],"hand":[],"recycling":[],"resourcePool":[]});
			for(j=0;j<territories;j++){
				this.player[i].play.push(new Card(this.deck.deal("territory")));
			}
			for(j=0;j<hand;j++){
				this.player[i].hand.push(new Card(this.deck.deal()));
			}
		}
		
		this.trash = [];
		
		this.turn=0;
		
		//kickstart game function
		this.gameTurn(this.turn);
	}


	gameTurn(player){
		//begining of turn
		
		//card draw
		//refresh
		
		
		//middle of turn
		//play
		//attack
		//play
		
		// end of turn
		//cleanuppp
		
	}



}