<?php
    $notes = array();

    $servername = "localhost";
    $username = "anthony";
    $password = "n7fHmx71j5eCrM0U";
    $dbname = "notes";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM notes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->num_rows;
        for ($i = 0; $i < $rows; $i++) {
            $currentNote = $result->fetch_assoc();
            $notes[$i]['ID'] = $currentNote['id'];
            $notes[$i]['Creation Date'] = $currentNote['creation_date'];
            $notes[$i]['Last Edit Date'] = $currentNote['last_edit_date'];
            $notes[$i]['Author'] = $currentNote['author'];
            $notes[$i]['Content'] = $currentNote['content'];
            $notes[$i]['Options'] = '<a id = "delete-note-' . $currentNote['id'] . '" class="note-delete waves-effect waves-light btn-small red">Delete</a>';
        }
        $numOfNotes = count($notes);
        $numOfNoteAttributes = count($notes[0]);

        echo '<table class = "centered striped"><thead><tr>';
        foreach ($notes[0] as $key=>$category) {
            echo '<th>' . $key . '</th>';
        }
        echo '</tr></thead>';
        echo '<tbody>';
        foreach ($notes as $note) { // Rows top to bottom
            echo '<tr>';
            $j = 0;
            foreach ($note as $field) { // Columns L->R
                if ($j == 0) {
                    echo '<td id = "note-id-' . $field . '">' . $field . '</td>';
                }
                else {
                    echo '<td>' . $field . '</td>';
                }
                $j++;
            }
            echo '</tr>';
        }
        echo '</tbody></table>';

    } else {
        echo '<table class = "centered striped"><thead><tr><th>Notes</th></tr></thead><tbody><tr><td>No notes found</td></tr></tbody></table>';
    }
    $conn->close();

?>