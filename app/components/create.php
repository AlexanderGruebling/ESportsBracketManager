<div layout="column">
    <md-input-container>
        <label>Anzahl der Spieler</label>
        <md-select ng-model="$ctrl.usercount" ng-change="$ctrl.createInputs()">
            <md-option><em>None</em></md-option>
            <md-option ng-value="4">4</md-option>
            <md-option ng-value="8">8</md-option>
            <md-option ng-value="16">16</md-option>
        </md-select>
    </md-input-container>

    <md-input-container>
        <label>Turniername</label>
        <input type="text" />
    </md-input-container>
    <div ng-repeat="field in $ctrl.inputFields">
        <md-input-container>
            <label>{{field.uname}}</label>
            <input type="text" />
        </md-input-container>
        <md-input-container>
            <label>{{field.vname}}</label>
            <input type="text" />
        </md-input-container>
        <md-input-container>
            <label>{{field.lname}}</label>
            <input type="text" />
        </md-input-container>
    </div>

    <md-button class="md-primary md-raised" ng-click="$ctrl.submitForm()">Submit</md-button>

</div>
