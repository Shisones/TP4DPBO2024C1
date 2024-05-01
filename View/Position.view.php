<?php
class PositionView {
    public function render($data) {
        $no = 1;
        $dataPosition = null;
        foreach($data as $record) {
            list($id, $name) = $record;
            $dataPosition .= "
                <tr>
                    <th>" . $no++ . "</th>
                    <td>" . $name . "</td>
                    <td>
                        <a class='btn btn-success' href='edit.php?position&id=$id'>Edit</a>
                        <a class='btn btn-danger' href='delete.php?position&id=$id' onclick='confirmDelete()'>Delete</a>
                    </td>
                </tr>
                
                ";
        }

        $tpl = new Template("Template/Position.html");
        $tpl->replace("DATA_TABEL", $dataPosition);
        $tpl->write();
    }
}

class PositionCreateView {
    public function render() {
        $allowed = 
        $dataCreate = '
        <form method=POST>
            <label> NAME: </label>
            <input type="text" name="name" class="form-control"> <br>

            <button class="btn btn-success" type="submit" name="create"> Create </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
        </form>
        ';

        $tpl = new Template("Template/PositionForm.html");
        $tpl->replace("DATA_FORM", $dataCreate);
        $tpl->write();
    }
}

class PositionEditView {
    public function render($data) {
        list($id, $name) = $data;
        $dataForm = '
        <form method=POST>
            <input type="hidden" name="id" value="'. $id .'" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="name" value="'. $name .'" class="form-control"> <br>

            <button class="btn btn-success" type="submit" name="update"> Update </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
        </form>
        ';
    
        $tpl = new Template("Template/PositionForm.html");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->write();
    }
}
