


/*

:(

*/


export class HAND {
    constructor(gui) {
        this.gui = gui;
        this.handEvent = null;

        this.startxy = null;
        this.endxy = null;

        this.minumum = 100;

        document.addEventListener("touchstart", (event) => {
            this.start(event);
        })
        document.addEventListener("touchend", (event) => {
            this.stop(event);
        })

    }




    start(event) {
        this.startxy = {
            x : event.changedTouches[0].screenX ,
            y : event.changedTouches[0].screenY
        }
    }

    stop(event) {
        this.endxy = {
            x : event.changedTouches[0].screenX ,
            y : event.changedTouches[0].screenY
        }

        // do the math
        const dx = Math.abs(this.startxy.x - this.endxy.x);
        const dy = Math.abs(this.startxy.y - this.endxy.y);
        const dxy = Math.abs(dx - dy);

        const ratioTest = dx > dy ? Boolean( dx > 2*dy ) :
            dx < dy ? Boolean( 2*dx < dy ) :
            false;

        const test = Boolean(dxy > this.minumum && ratioTest);

        if (test)
            this.emit();

        this.startxy = null;
        this.endxy = null;
    }


    emit() {
        let dir = null;

        if (this.startxy.x > this.endxy.x) {
            dir = "left";
        } else if (this.startxy.x < this.endxy.x) {
            dir = "right";
        } else if (this.startxy.y > this.endxy.y) {
            dir = "up";
        } else if (this.startxy.y > this.endxy.y) {
            dir = "down";
        }

        if(dir)
            this.gui.processRotate(dir);
    }

}