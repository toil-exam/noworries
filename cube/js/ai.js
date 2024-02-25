

import { GM } from "/cube/js/gm.js";


export class AI {
    constructor(cube) {
        this.cube = cube;
        this.winmap = GM.winMap(); // store it so it's not being run over and over
    }

    play() {
        const spaces = this.cube.getSpaces();

        let rankMap = [];
        let temp, pc, ai, r, win, w, x;

        //for (w = 0; w < this.winmap.length; w++) {
            //win = this.winmap[w];
        for (const win of this.winmap) {
            pc = 0;
            ai = 0;
            
            for (x = 0; x < 3; x++) {
                const value = spaces[win[x]];
                if (value === "X") pc++;
                else if (value === "O") ai++;
            }

            temp = "pc" + pc + "ai" + ai;
            if (!rankMap[temp])
                rankMap[temp] =  [];
            rankMap[temp].push(win); // and then push the wincon
        }

        //console.log(rankMap);

        if (rankMap["pc0ai2"]) {
            // where the ai has two marks and thus a third would clench
            r = Math.floor( Math.random() * rankMap["pc0ai2"].length );
            win = rankMap["pc0ai2"][r];
            for (x of win) {
                if (this.cube.getSpace(x) === " ") {
                    console.log("pc0ai2 // ai plays: " + x);
                    return x; // returns play()
                }
            }
        } else if (rankMap["pc2ai0"]) {
            // where player has two marks and thus ai has to block
            r = Math.floor( Math.random() * rankMap["pc2ai0"].length );
            win = rankMap["pc2ai0"][r];
            for (x of win) {
                if (this.cube.getSpace(x) === " ") {
                    console.log("pc2ai0 // ai plays: " + x);
                    return x; // returns play()
                }
            }
        } else if (rankMap["pc1ai0"]) {
            // pc has already played, block them
            r = Math.floor( Math.random() * rankMap["pc1ai0"].length );
            win = rankMap["pc1ai0"][r];
            temp = [];
            for (x of win) {
                if (this.cube.getSpace(x) === " ")
                    temp.push(x);
            }
            const play = Math.floor( Math.random() * temp.length );
            console.log("pc1ai0 // ai plays: " + temp[play]);
            return temp[play]; // returns play()
        } else if (rankMap["pc0ai1"]) {
            // where only the ai has a mark, aiming to set up for three in a row
            r = Math.floor( Math.random() * rankMap["pc0ai1"].length );
            win = rankMap["pc0ai1"][r];
            temp = [];
            for (x of win) {
                if (this.cube.getSpace(x) === " ")
                    temp.push(x);
            }
            const play = Math.floor( Math.random() * temp.length );
            console.log("pc0ai0 // ai plays: " + temp[play]);
            return temp[play];
        }// chain off any further plays i guess

        // default, random empty
        temp = [];
        for (x = 1; x < 28; x++) {
            if (spaces[x] === " ") 
                temp.push(x);
        }
        r = Math.floor( Math.random() * temp.length );
        console.log("pc0ai0 // ai plays: " + temp[r]);
        return temp[r];
    }
}

