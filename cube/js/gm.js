
/**

                    19 20 21
                    10 11 12    north
                    1  2  3


                    1  2  3
                    4  5  6     sky
                    7  8  9


1  4  7             7  8  9                 9  6  3
10 13 16            16 17 18    south       18 15 12
19 22 25            25 26 27                27 24 21
west                                            east

                    25 26 27
                    22 23 24    ground
                    19 20 21
up positions 

*/

export class GM {

    constructor() {
        return this;
    }

    static clearBoard() {
        let output = [];
        for (let i = 1; i < 28; i++) { // there's no zero on the map whoops
            output[i] = i === 14 ? null : " "; // 14 is the center of the cube and can't be played
        }
        return output;
    }

    static faceNames = ["north", "sky", "west", "south", "east", "ground"];

    static dirNames = ["up", "right", "down", "left"]; // indexOf will convert to turns of

    static dirNum(dir) {
        return this.dirNames.indexOf(dir);
    }

    static orientation(dir) {
        return dir === "left" || dir === "right" ? "horizontal" : "vertical";
    }

    static randomFace() {
        const r = Math.floor( Math.random() * 6 );
        return this.faceNames[r];
    }

    static randomDir() {
        const r = Math.floor( Math.random() * 4 );
        return this.dirNames[r];
    }

    static addDirs(...dirs) { // spread operator takes multiple dirs
        let output = 0; // 0 is up
        for (const dir of dirs) {
            output += this.dirNum(dir);
            if (output > 3) output -= 4;
        }
        output = this.dirNames[output]; // convert num back to dir
        return output;
    }

    static subDirs(initial, ...subs) {
        let output = this.dirNum(initial);
        for (const sub of subs) {
            output -= this.dirNum(sub);
            if (output < 0) output += 4;
        }
        output = this.dirNames[output];
        return output;
    }

    static antiDir(dir) {
        return this.addDirs(dir, "down"); // down is 2 ie the opposite side
    }

    static faceMap = { // all in their "up" position
        "north" : [ [19,20,21], [10,11,12], [1,2,3] ],
        "sky" : [ [1,2,3], [4,5,6], [7,8,9] ],
        "west" : [ [1,4,7], [10,13,16], [19,22,25] ],
        "south" : [ [7,8,9], [16,17,18], [25,26,27] ],
        "east" : [ [9,6,3], [18,15,12], [27,24,21] ],
        "ground" : [ [25,26,27], [22,23,24], [19,20,21] ]
    };

    static transformMap = { // "fromFace" : {"dir" : ["toFace", "toDir"] }
        "north" : {"up" : ["ground", "up"], "right" : ["east", "down"], "down": ["sky", "up"], "left": ["west", "down"]},
        "sky" : {"up" : ["north", "up"], "right" : ["east", "left"], "down": ["south", "up"], "left": ["west", "right"]},
        "west" : {"up" : ["sky", "left"], "right" : ["south", "up"], "down": ["ground", "right"], "left": ["north", "down"]},
        "south" : {"up" : ["sky", "up"], "right" : ["east", "up"], "down": ["ground", "up"], "left": ["west", "up"]},
        "east" : {"up" : ["sky", "right"], "right" : ["north", "down"], "down": ["ground", "left"], "left": ["south", "up"]},
        "ground" : {"up" : ["south", "up"], "right" : ["east", "right"], "down": ["north", "down"], "left": ["west", "left"]},
    };

    static winMap() {
        let output= [];

        for (const faceName of this.faceNames) {
            let face = this.faceMap[faceName];
            for (let x = 0; x <3; x++) {
                output.push([ face[x][0], face[x][1], face[x][2] ],
                    [ face[0][x], face[1][x], face[2][x] ]);
            }
            output.push([ face[0][0], face[1][1], face[2][2] ],
                [ face[0][2], face[1][1], face[2][0] ]);
        }

        output = Array.from(new Set(output.map(JSON.stringify)), JSON.parse); // SO says this will remove duplicates, cool why not
        //console.log(output);
        return output;
    };

    static rotateFace(input, dir) { // input should be 3x3 array
        let output;

        if (dir === "up") { // up is default
            output = input;
        } else if (dir === "right") {
            output = [
                    [ input[2][0], input[1][0], input[0][0] ] ,
                    [ input[2][1], input[1][1], input[0][1] ] ,
                    [ input[2][2], input[1][2], input[0][2] ]
                ];
        } else if (dir === "down") {
            output = [
                    [ input[2][2], input[2][1], input[2][0] ] ,
                    [ input[1][2], input[1][1], input[1][0] ] ,
                    [ input[0][2], input[0][1], input[0][0] ]
                ];
        } else if (dir ===  "left") {
            output = [
                    [ input[0][2], input[1][2], input[2][2] ] ,
                    [ input[0][1], input[1][1], input[2][1] ] ,
                    [ input[0][0], input[1][0], input[2][0] ]
                ];
        }
        
        return output;
    };


    static face(faceName, dir = "up") {
        let output = this.faceMap[faceName];
        if (dir !== "up") output = this.rotateFace(output, dir);
        return output;
    }

    static indexInFace(index, faceName) {
        const face = this.faceMap[faceName];
        for (let x = 0; x < 3; x++) {
            for (let y = 0; y < 3; y++) {
                if (index == face[x][y]) {
                
                //let row = face[x];
                //if (row.includes(index)) {
                    console.log("index: " + index + " in face: " + faceName);
                    return true;
                
                }
            }
        }
        console.log("index: " + index + " NOT in face: " + faceName);
        return false;
    }

    static faceTransform(faceName, dir) {

    }

    
}

