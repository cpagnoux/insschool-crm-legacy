<fieldset>
  <div class="form-row">
    <label for="subject">Objet :</label><br>
    <input id="subject" type="text" name="subject" required>
  </div>

  <div class="editor">
    <textarea id="message" name="message"></textarea>
    <script>CKEDITOR.replace('message');</script>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Envoyer">
  </div>
</fieldset>
