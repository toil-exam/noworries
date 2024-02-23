
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



// when dom is ready
$(document).ready(function(){




class GM {

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
        const r = Math.floor(Math.random() * 6);
        return this.faceNames[r];
    }

    static randomDir() {
        const r = Math.floor(Math.random() * 4);
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
        const output= [];

        for (const face of GM.faceMap) {
            for (const x = 0; x <3; x++) {
                output.push([ face[x][0], face[x][1], face[x][2] ],
                    [ face[0][x], face[1][x], face[2][x] ]);
            }
            output.push([ face[0][0], face[1][1], face[2][2] ],
                [ face[0][2], face[1][1], face[2][0] ]);
        }

        output = Array.from(new Set(output.map(JSON.stringify)), JSON.parse); // SO says this will remove duplicates, cool why not

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

    static faceTransform(faceName, dir) {

    }

    
}




class Cube {
    constructor() {
        this.resetGame();


        this.gui = new GUI(this);
    }



    resetGame() {
        this.spaces = GM.clearBoard();
        this.currentPlayer = true; // false is computer
        this.currentFace = "sky"; // default
        this.currentDir = "up"; // default
    }

    getSpace(index) {
        return this.spaces[index];
    }

    setSpace(index, value) {
        this.spaces[index] = value;
    }

    processMove(index) {
        // based on current player place "X" or "O" in appropriate place
        // change current player
        if (this.getSpace(index) === " ") {
            const mark = this.currentPlayer ? "X" : "O";
            this.setSpace(index, mark);
            this.currentPlayer = !this.currentPlayer;
            //console.log("move processed: " + mark);
            this.gui.updateSpace(index); // tell the gui to update
        }
    }

}



class GUI {
    constructor(cube) {
        this.cube = cube;
        this.board = $("#cubeBoard");
        for (const dir of GM.dirNames) {
            const triggerFunction = () => { this.processRotate(dir) };
            $("#" + dir + "Button").on("click", triggerFunction); // attach event handlers to the dir buttons
        }
        this.resetGame();
        
    }

    setFace(face, dir) {
        this.currentFace = face;
        this.currentDir = dir;
    }

    getFace() { return this.currentFace; }

    getDir() { return this.currentDir; }

    resetGame(face = "sky", dir = "up") {
        this.setFace(face, dir);
        this.buildFace(face, dir);
    }


    processRotate(dir) {
        // create new face
        const transformMap = GM.transformMap;
        const oldFace = this.currentFace;
        const oldDir = this.currentDir;
        
        //console.log("////////////////////////");
        //console.log("// old face: " + oldFace + " + " + oldDir);
        let adjDir = GM.subDirs(dir, oldDir); // adjust current tilt with input direction
        adjDir = GM.antiDir(adjDir); // the map points in the direction of the face which is opposite to the input direction whoops
        
        //console.log("// click dir: " + dir + " -> " + adjDir);
        const [newFace, newDir] = transformMap[oldFace][adjDir];
        const newAdjDir = GM.addDirs(newDir, oldDir);
        
        // adjust board area display : block vs inline pretty sure
        const orientation = GM.orientation(dir);
        let display;
        if (orientation === "horizontal")
            display = "flex";
        else if (orientation === "vertical")
            display = "block";
        this.board.css("display", display);
        
        //console.log("// new face: " + newFace + " + " + newDir + " -> " + newAdjDir);
        const prepend = dir === "down" || dir === "right";
        this.buildFace(newFace, newAdjDir, prepend);
        
        // animate both faces
        $(".face-" + oldFace).addClass("shrink-" + dir);
        $(".face-" + newFace).addClass("grow-" + dir);
        
        $(".face-" + newFace).on("animationend", () => {
            // remove old face 
            $(".face-" + oldFace).hide();
            $(".face-" + oldFace).remove();
            
            this.setFace(newFace, newAdjDir);
            // remove animation from new face
            $(".face-" + newFace).removeClass("grow-" + dir);
            $(".face-" + newFace).off("animationend"); // is this neccessary ??
            $("#rightButton").removeClass("jolt-up jolt-left");
            $("#downButton").removeClass("jolt-up-twice");
            $("#leftButton").removeClass("jolt-up jolt-right");
            });
        $(".face-" + newFace).show(); // technically this fires before the animationend
        
        if (orientation === "horizontal") {
            $("#rightButton").addClass("jolt-left");
            $("#leftButton").addClass("jolt-right");
        } else if (orientation === "vertical") {
            $("#rightButton").addClass("jolt-up");
            $("#downButton").addClass("jolt-up-twice");
            $("#leftButton").addClass("jolt-up");
        }
    }

    processMove(index) {
        // pass around the event
        this.cube.processMove(index);
    }


    buildFace(faceName, dir, prepend = false) {
        const face = $("<div>", { class: "face face-" + faceName });
        if (faceName !== this.cube.currentFace)
            face.hide();
        prepend ? this.board.prepend(face) : this.board.append(face);

        const faceMap = GM.face(faceName, dir);
        const gui = this;
                
        for (let x = 0; x < 3; x++) {
            const row = $("<div>", { class: "row row" + x });
            face.append(row);

            for (let y = 0; y < 3; y++) {
                const index = faceMap[x][y];
                const value = this.cube.getSpace(index);
                const clickFunction = () => {
                    gui.processMove(index);
                    //console.log(index + ": " + value);
                };
                /*
                const overFunction = () => {
                    console.log("face: " + faceName + ", index: " + index);
                };
                */

                let mark = "no-mark";
                if (value === "X") mark = "x-mark";
                else if (value === "O") mark = "o-mark";

                const space = $("<span>", { class: "space space-" + index + " " + mark});
                const container = $("<span>", { class: "container container-" + index});
                space.append(container);
                container.html(value);
                //space.html(value);
                space.on("click", clickFunction);
                //space.on("mouseover", overFunction);
                row.append(space);
        
            }
        }

    }

    updateSpace(index) {
        const value = this.cube.getSpace(index);
        const space = $(".space-" + index);
        const container = $(".container-" +index);
        
        let mark = "no-mark";
        if (value === "X") mark = "x-mark";
        else if (value === "O") mark = "o-mark";
        space.removeClass("no-mark x-mark o-mark");
        space.addClass(mark);
        container.html(value);
        space.off("click");
        //console.log("updated space " + index + " to " + value);
    }
}




const cube = new Cube();

});