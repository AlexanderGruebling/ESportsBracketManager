"use strict";

app.factory("Player", function () {

    function Player(firstname, lastname, email, username) {
        this.firstname = firstname;
        this.lastname = lastname;
        this.email = email;
        this.username = username;
    }

    return Player;
});
