<form name="$ctrl.tournamentForm" ng-submit="$ctrl.submitForm()">
    <md-input-container>
        <label>Select a tournament</label>
        <md-select ng-model="$ctrl.tournamentForm.tournamentName">
            <?php
                use Doctrine\ORM\Tools\Setup;

                require_once "../vendor/autoload.php";
                require_once "../bootstrap.php";

                // Create a simple "default" Doctrine ORM configuration for Annotations
                $isDevMode = true;
                $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
                // or if you prefer yaml or XML
                //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
                //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

                require "../Database/UserCredentialsDB.php";

                // database configuration parameters
                /*$conn = array(
                    'driver' => 'pdo_sqlite',
              'path' => __DIR__ . '/db.sqlite',
              );*/

                $productRepository = $entityManager->getRepository('HTL3R\ESportsBracketManager\Tournament');
                $GLOBALS['tournaments'] = $productRepository->findAll();
                for($i = 0; $i < sizeof($GLOBALS['tournaments']); $i++){
                    echo '<md-option value="'.$GLOBALS['tournaments'][$i]->getId().'">
                    '.$GLOBALS['tournaments'][$i]->getTournamentName().'
                    </md-option>';
                }
            ?>
        </md-select>
    </md-input-container>
    <input type="submit">
    <div layout="column" layout-align="center center">
        <h1></h1>
        <div ng-repeat="player in $ctrl.players">
            <player  name="{{player.username}}"></player>
            <p ng-if="$index % 2 == 0" style="margin: auto;"> vs. </p>
            <br ng-if="!($index % 2 == 0)"/>
        </div>
    </div>
</form>

