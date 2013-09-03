<div class="hide row upload-confirm"></div>
<div class="upload-container">
  <div class="upload-message upload-progress"><img src="/assets/images/upload-big.gif" align="absmiddle">Currently uploading <span class="completed">0</span> of <span class="total">0</span> photos.</div>

  <form class="upload form-stacked photo-upload-submit" method="post" action="/photo/upload">
    <div class="row">
      <br>
      <div class="span8">
        <h3>Upload from your computer</h3>
        <div id="uploader">
          <div class="insufficient">
            <h1>Unfortunately, it doesn't look like we support your browser. :(</h1>
            <p>
              Try using <a href="http://www.mozilla.org/en-US/firefox/new/">Firefox</a>.
            </p>
          </div>
        </div>
        <em class="poweredby">Powered by <a href="http://www.plupload.com">Plupload</a>.</em>
      </div>
      <div class="span4">
        <h3>Use these settings.</h3>
        <br>
        <label for="tags">Tags</label>
        <input type="search" name="tags" class="typeahead tags" autocomplete="off" placeholder="Optional comma separated list">

        <div class="control-group">
          <label class="control-label">Albums <small>(<a href="#" class="showBatchForm album" data-action="albums">create new</a>)</small></label>
          <select data-placeholder="Select albums for these photos" name="albums" class="typeahead">
            <?php if($this->user->isAdmin()) { ?><option value="">If you'd like, choose an album</option><?php } ?>
            <?php foreach($albums as $album) { ?>
              <option value="<?php $this->utility->safe($album['id']); ?>"><?php $this->utility->safe($album['name']); ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="control-group">
          <label for="tags">Permission</label>
          <div class="controls">
            <label class="radio inline private">
              <input type="radio" name="permission" value="0"<?php if($preferences['permission'] === false || $preferences['permission'] === '0') { ?> checked="checked"<?php } ?>>
              <span>Private</span>
            </label>
            <label class="radio inline">
              <input type="radio" name="permission" value="1"<?php if($preferences['permission'] === '1') { ?> checked="checked"<?php } ?>>
              <span>Public</span>
            </label>
          </div>
        </div>

        <label for="license">License</label>
        <select name="license" class="license">
          <?php foreach($licenses as $code => $license) { ?>
            <option value="<?php $this->utility->safe($code); ?>" <?php if($license['selected']) { ?> selected="selected" <?php } ?>><?php $this->utility->licenseName($code); ?></option>
          <?php } ?>
        </select>

        <input type="hidden" name="crumb" value="<?php $this->utility->safe($crumb); ?>">
        
        <div class="btn-toolbar">
          <button type="submit" class="btn btn-theme-secondary upload-button">Start uploading</button>
        </div>
      </div>
    </div>
  </form>
</div>
