//deck

class Deck {
	constructor(){
		this.deck = [];
		this.fill(1000);
		this.shuffle();
	}
	
	
	fill(x){
		//add allllll the cards
		//id numbers will be used like 9/10 for cards when they're in places like in the deck 
		for(var i=0;i<x;i++){
			this.deck[x]=x;
		}
		//later come back and make it go through card catalog
		//slots for rarities
		//1x for mythic and rare
		//2x for unc
		//4x for common
		//6x for dirt
	}
	
	
	shuffle(){
		//iterate through and do a rando-swap at each location
		//literal real life shuffle would run an algo to do this but uhhhhh this is faster simpler and more efficient
		let x = this.deck.length;
		for(var i=0;i<x;i++){
			let j = Math.floor(Math.random() * x);
			let temp = this.deck[i];
			this.deck[i] = this.deck[j];
			this.deck[j] = temp;
		}
	}
	
	
	deal(){
		//pop that sumbitch
		return this.deck.pop();
	}
	
	
	currentSize(){
		return this.deck.length;
	}
	
	
}