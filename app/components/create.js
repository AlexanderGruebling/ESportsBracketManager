"use strict";

app.component("create", {
    templateUrl: "components/create.php",
    controller: "CreateController",
    bindings: {}
});


app.config(function ($stateProvider, $urlRouterProvider) {
    $stateProvider.state({
        name: "create",
        url: "/create",
        component: "create"
    });

    // $urlRouterProvider.otherwise("/create");
});


app.controller("CreateController", function ($log) {

    $log.debug("CreateController()");

    this.inputFields = [];

    this.createInputs = () => {
        console.log(this.usercount);
        this.inputFields = [];
        for(let i = 0; i < this.usercount; i++){
            this.inputFields.push({uname: "Username", vname: "Vorname", lname: "Nachname"});
        }
    }

    this.submitForm = () => {
        $http.get(`http://e.sports/create-tournament.php`)
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
    }
});