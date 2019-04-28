"use strict";

app.component("playerList", {
    templateUrl: "components/player-list.php",
    controller: "PlayerListController",
    bindings: {}
});


app.config(function ($stateProvider, $urlRouterProvider) {
    $stateProvider.state({
        name: "player-list",
        url: "/player-list",
        component: "playerList"
    });

    $urlRouterProvider.otherwise("/player-list");
});


app.controller("PlayerListController", function ($log, $http, Player) {

    $log.debug("PlayerListController()");

    this.players = [];

    $http.get(`http://e.sports/components/get-players.php?tournament=0`)
        .then(response => {
            let playersJSON = JSON.parse(JSON.stringify(response));
            console.log(playersJSON);
            for(let i = 0; i < playersJSON.data.length; i++){
                console.log(playersJSON.data[i]);
                this.players[i] = new Player(
                    playersJSON.data[i][0],
                    playersJSON.data[i][1],
                    playersJSON.data[i][2],
                    playersJSON.data[i][3]);
            }
        })
        .catch(error => {
            console.log(error);
        });

    this.submitForm = () => {
        $http.get(`http://e.sports/components/get-players.php?tournament=${this.tournamentForm.tournamentName}`)
            .then(jsonResponse => {
                let playersJSON = JSON.parse(JSON.stringify(jsonResponse));
                console.log(playersJSON);
                for(let i = 0; i < playersJSON.data.length; i++){
                    console.log(playersJSON.data[i]);
                    this.players[i] = new Player(
                        playersJSON.data[i][0],
                        playersJSON.data[i][1],
                        playersJSON.data[i][2],
                        playersJSON.data[i][3]);
                }
            })
            .catch(error => {
                console.log(error);
            });
        //console.log(this.tournamentForm.tournamentName);
    }

});
