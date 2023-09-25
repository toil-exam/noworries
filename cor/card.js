//card


/*
Card types 

Cor (heart, core) - Stronghold - one per player, from separate deck, determines faction, territory strength / number, hand size, territory abilities, generic resource generation etc
cor - name, faction, text (territory and hand rules), health

Territory - strength modifier, abilities, resource generation, players start with generic face down card but then there are territory cards that are played to develop the existing property
territory - name, cost, text, health 

Resource - gold wood stone metal food water jem?, right for generic use down for super use left for needy use
resource - name, cost, text

Character - strength, health, abilities, the crux of battling and destroying enemy territory, some can generate resources
character - name, faction, cost, text, attack, health

Item - attach, modifiers, abilities, weapons armor, when an item has a use ability it can be used attached or separate, can only equip when both it and the character are up, the package of the character and item has the use ability
item - name, cost, text

Action - speed? ability etc, one time use or aoe effects or maybe everybody gets 1 kinda stuff, events
action - name, cost, text

*/

const cardtypes = ["cor","territory","resource","character","item","action"];


class Card {
	constructor(
			id=false, 
			name=false, faction=false, cost=false, 
			type=false, subtype=false, rarity=false, art=false, 
			text=false, attack=false, health=false) {
				
		//card data
		this.id = id;
		
		this.name = name;
		this.faction = faction;
		this.cost = cost;
		
		this.type = type;
		this.subtype = subtype;
		this.rarity = rarity;
		this.art = art;
		
		this.text = text;
		this.attack = attack;
		this.health = health;
		
		
		//card metadata
		this.direction = "up";
		this.counters = 0;
		this.damage = 0;
		
		this.face = "down";
		//zone may get taken out and tracked by the game itself
		this.zone = "deck";
		this.token = false;
		this.undevelopedTerritory = false;
		
		this.test = true;
		
	}
	
	displayCard(x,state="play"){
		this.x = document.getElementById(x);
		this.x.classList.add("card");
		
		this.state = state;
	
		//ha ha check this math, do some equations
		if(this.state = "play"){
			this.x.style.backgroundPosition = 150 + "px";
		}else{
			this.x.style.backgroundPosition = "0px";
		}
		
	}
	
	
	id(){
		return this.id;
	}
	name(){
		return this.name;
	}
	faction(){
		return this.faction;
	}
	cost(){
		return this.cost;
	}
	text(){
		return this.text;
	}
	attack(){
		return this.attack;
	}
	health(){
		return this.health;
	}
	
	turn(dir){
		this.direction = dir;
	}
	up(){
		this.turn("up");
	}
	down(){
		this.turn("down");
	}
	left(){
		this.turn("left");
	}
	right(){
		this.turn("right");
	}
	
	takeDamage(x){
		if(x == "clear"){
			this.damage = 0;
		}else{
			this.damage += x;
		}
		if(this.damage >= this.health){
			//THIS.DIE
		}
	}
	
	flip(face){
		this.face = face;
	}
	faceup(){
		this.flip("up");
	}
	facedown(){
		this.flip("down");
	}
	
	//zoning might get moved to game object for better control etc
	move(zone){
		this.zone = zone;
	}
	moveDeck(){
		this.move("deck");
	}
	moveHand(){
		this.move("hand");
	}
	movePlay(){
		this.move("play");
	}
	moveRecycle(){
		this.move("recycling");
	}
	moveTrash(){
		this.move("trash");
	}
	
}