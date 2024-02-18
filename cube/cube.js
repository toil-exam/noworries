
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

*/






class GM {

    static clearBoard() {
        let spaces = [];
        for (i = 0; i < 27; i++) {
            spaces[i] = i === 14 ? null : "";
        }
        return spaces;
    }

    static faceNames = ["north", "sky", "west", "south", "east", "ground"];

    static dirNames = ["up", "right", "down", "left"];

    static randomFace() {
        const r = Math.floor(Math.random() * 6);
        return this.faceNames[r];
    }

    static randomDir() {
        const r = Math.floor(Math.random() * 4);
        return this.dirNames[r];
    }

    static addDirs(...dirs) {
        let output = 0; // 0 is up
        for (dir of dirs) {
            output += this.dirNames.indexOf(dir);
            output -= output > 3 ? 4 : 0; // if more than 3, then -4 else -0
        }
        output = this.dirNames[output]; // convert numb back to dir
        return output;
    }

    static faceMap = { // all in their "up" position
        "north" : [ [19,20,21], [10,11,12], [1,2,3] ],
        "sky" : [ [1,2,3], [4,5,6], [7,8,9] ],
        "west" : [ [1,4,7], [10,13,16], [19,22,23] ],
        "south" : [ [7,8,9], [16,17,18], [25,26,27] ],
        "east" : [ [9,6,3], [18,15,12], [27,24,21] ],
        "ground" : [ [25,26,27], [22,23,24], [19,20,21] ]
    };

    static transformMap = {
        "north" = {"up" : ["ground", "up"], "right" ["east", "down"]: "down": ["sky", "up"], "left": ["west", "down"]},
        "sky" = {"up" : ["north", "up"], "right" ["east", "left"]: "down": ["south", "up"], "left": ["west", "right"]},
        "west" = {"up" : ["sky", "left"], "right" ["south", "up"]: "down": ["ground", "right"], "left": ["north", "down"]},
        "south" = {"up" : ["sky", "up"], "right" ["east", "up"]: "down": ["ground", "up"], "left": ["west", "up"]},
        "east" = {"up" : ["sky", "right"], "right" ["north", "down"]: "down": ["ground", "left"], "left": ["south", "up"]},
        "ground" = {"up" : ["south", "up"], "right" ["east", "right"]: "down": ["north", "down"], "left": ["west", "left"]},
    };

    static rotateFace(input, dir) { // input should be 3x3 array
        let output = input; // up is default
        if (dir === "right") {
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
        let output = this.faceMap[dir];
        if (dir !== "up") output = this.rotateFace(output, dir);
        return output;
    }

    static faceTransform(faceName, dir) {

    }

    static winMap = [];
}




class Cube {
    constructor() {
        this.clearBoard();


        this.gui = new GUI(cube = this);
    }



    clearBoard() {
        this.spaces = GM.clearBoard();
        this.setFace(); // defaults
    }

    setFace(faceName = "south", dir = null) {
        this.currentFace = faceName;
        this.currentDir = dir ?? "up";
    }
}



class GUI {
    constructor(cube) {
        this.cube = cube;
        this.board = $("#cubeBoard");
        
    }
}


// when dom is ready
$(document).ready(function(){
    const cube = new Cube();
});