 <?php
///////////////////
// Programmer: Joshua T. Frey
// File:       databaseConnect.php
// Description: starts a database connection using the
//              msqli php library
//
//


    DEFINE('BASE_URL', 'voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/');
    // FUNCTION: makeConnection
    // PURPOSE:  establishes a connection to a database using the
    //           globals defined at the beginning of this script
    // @return mysqli resource on success
    //  displays error message on failure
    function makeConnection( $db_exists=true ) {
        // For establishing a connection to the mysql database
        DEFINE('_HOST_NAME', 'localhost');
        DEFINE('_USER_ID', 'cs3140b2');
        DEFINE('_PW', 'bTg4Gd');
        DEFINE('_DATABASE', 'cs3140b2');

        if( $db_exists ) {
            $connection = new mysqli(_HOST_NAME, _USER_ID, _PW, _DATABASE);
        }
        else {
            $connection = new mysqli(_HOST_NAME, _USER_ID, _PW);
        }

        //Confirm connection
        if( $connection->connect_error) {
            die( "Connection failed: " . $connection->connect_error );
        }
        // $mysqli->set_charset("utf8");
        return $connection;
    } //END makeConnectoin

    // FUNCTION: closeConnection
    // PURPOSE:  terminates a mysqli connection
    //  @param1 is a connection variable to be closed
    function closeConnection($connection) {
        mysqli_close($connection);
    } //END closeConnection

    // FUNCTION: showSchema)_
    // PURPOSE:  displays the schema of the database
    //           being used to html in very hard to 
    //           follow ul
    function showSchema() {
        echo 'Printing the database schema<br />';
        $connection = makeConnection( );
        mysqli_select_db($connection, $_DATABASE);
        $tables = array();
        //get a listing of tables
        unset($result);

        //wri
        $query = "SHOW TABLES";
        if( !($result = mysqli_query($connection, $query) ) ) {
            echo 'ERRROR IN QUERY';
        }

        while( $row = mysqli_fetch_array( $result) ) {
            $tableList[] = $row[0];
            //echo $row[0];
        }

        foreach($tableList as $table) {
            
            unset($query);
            unset($row);
            unset($result);
            echo $table . '<ul>';
            $query = "SHOW COLUMNS FROM " . $table;
            $result = mysqli_query($connection, $query);
            while( $row = mysqli_fetch_array( $result ) ) {
                echo '<li>';
                foreach($row as $value) {
                    echo " | " . $value;
                }
                echo '</li>';
            }
            echo '</ul>';

        }
        closeConnection($connection);
        echo 'END OF SHOW SCHEMA <br />';
    } //END showSchema

?>

