<?php
class MemberView {
    public function render($data) {
        $no = 1;
        $dataMember = null;
        foreach($data as $record) {
            list($id, $name, $email, $phone, $join_date) = $record;
            $dataMember .= "
                <tr>
                    <th>" . $no++ . "</th>
                    <td>" . $name . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>
                        <a class='btn btn-success' href='edit.php?id=$id'>Edit</a>
                        <a class='btn btn-danger' href='delete.php?id=$id' onclick='confirmDelete()'>Delete</a>
                    </td>
                </tr>
                
                ";
        }

        $tpl = new Template("Template/Member.html");
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write();
    }
}

class MemberCreateView {
    public function render() {

        $dataCreate = '
        <form method=POST>
            <label> NAME: </label>
            <input type="text" name="name" class="form-control"> <br>

            <label> EMAIL: </label>
            <input type="text" name="email" class="form-control"> <br>

            <label> PHONE: </label>
            <input type="text" name="phone" class="form-control"> <br>
                
            <label> JOIN DATE: </label>
            <input type="text" name="join_date" class="form-control"> <br>
                
            <button class="btn btn-success" type="submit" name="create"> Create </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
        </form>
        ';

        $tpl = new Template("Template/MemberForm.html");
        $tpl->replace("DATA_FORM", $dataCreate);
        $tpl->write();
    }
}

class MemberEditView {
    public function render($data) {
        list($id, $name, $email, $phone, $join_date) = $data;
        $dataForm = '
        <form method=POST>
            <input type="hidden" name="id" value="'. $id .'" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="name" value="'. $name .'" class="form-control"> <br>

            <label> EMAIL: </label>
            <input type="text" name="email" value="'. $email .'" class="form-control"> <br>

            <label> PHONE: </label>
            <input type="text" name="phone" value="'. $phone .'"  class="form-control"> <br>
                
            <label> JOIN DATE: </label>
            <input type="text" name="join_date" value="'. $join_date .'" class="form-control"> <br>
                
            <button class="btn btn-success" type="submit" name="update"> Update </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
        </form>
        ';
    
        $tpl = new Template("Template/MemberForm.html");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->write();
    }
}
