<fieldset>
  <div class="form-group">
    <label for="subject">Objet</label>
    <input id="subject" type="text" name="subject" required>
    <span></span>
  </div>

  <div class="editor">
    <textarea id="message" name="message"></textarea>
    <script>CKEDITOR.replace('message');</script>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <input type="submit" name="submit" value="Envoyer">
  </div>
</fieldset>
