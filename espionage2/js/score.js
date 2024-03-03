

export class ScoreCard {

    constructor() {
        this.scoreCard = [];
    }

    reportRound(...scores) {
        this.scoreCard.push([...scores]);
    }

    getScores() { return this.scoreCard; }

    getCurrentScores() {
        output = [0, 0, 0, 0];
        for (round in this.scoreCard) {
            for (player = 0; player < 4; player++) {
                output[player] += round[player];
            }
        }
        return output;
    }

    gameOver() {
        for (score in this.getCurrentScores()) {
            if (score > 100)
                return true;
        }
        return false;
    }

}