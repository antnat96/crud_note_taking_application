<!-- Modal Structure -->
<div id="create-note-modal" class="modal">
    <div class="modal-content">
        <h4>Create a New Note</h4>
        <div class = "row">
            <div class = "col s12 m6 l6">
                <input id = "author-input" type = "text" name = "author"></input>
                <label for = "author">Author</label>
            </div>
        </div>

        <div class = "row">
            <div class = "col s12 m12 l12">
                <input id = "contents-input" type = "text" name = "contents"></textarea>
                <label for = "contents">Contents</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a id = "cancel-add" href="#!" class="modal-close waves-effect waves-light btn-small red">Cancel</a>
        <a id = "add-note" href="#!" class="modal-close waves-effect waves-light btn-small"><i class="material-icons left">add</i>Add Note</a>
    </div>
</div>