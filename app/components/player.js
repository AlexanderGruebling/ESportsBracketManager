"use strict";

app.component("player", {
    templateUrl: "components/player.html",
    controller: "PlayerController",
    bindings: {
        name: "@"
    }
});


app.controller("PlayerController", function ($log) {

    $log.debug("PlayerController()");

});
