<form>
  <fieldset>
    <legend>Select States:</legend>
    <label>
      <input type="checkbox" name="state" value="Andhra Pradesh"> Andhra Pradesh
    </label>
    <br>
    <label>
      <input type="checkbox" name="state" value="Arunachal Pradesh"> Arunachal Pradesh
    </label>
    <br>
    <label>
      <input type="checkbox" name="state" value="Assam"> Assam
    </label>
    <br>
    <!-- and so on for all states... -->
  </fieldset>
  <br>
  <fieldset>
    <legend>Select Districts:</legend>
    <div id="andhra-pradesh" style="display: none;">
    <label>
    <input type="checkbox" name="state" value="Andhra Pradesh"> Andhra Pradesh
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Arunachal Pradesh"> Arunachal Pradesh
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Assam"> Assam
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Bihar"> Bihar
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Chhattisgarh"> Chhattisgarh
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Goa"> Goa
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Gujarat"> Gujarat
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Haryana"> Haryana
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Himachal Pradesh"> Himachal Pradesh
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Jharkhand"> Jharkhand
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Karnataka"> Karnataka
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Kerala"> Kerala
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Madhya Pradesh"> Madhya Pradesh
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Maharashtra"> Maharashtra
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Manipur"> Manipur
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Meghalaya"> Meghalaya
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Mizoram"> Mizoram
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Nagaland"> Nagaland
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Odisha"> Odisha
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Punjab"> Punjab
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Rajasthan"> Rajasthan
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Sikkim"> Sikkim
  </label>
  <br>
  <label>
    <input type="checkbox" name="state" value="Tamil Nadu"> Tamil Nadu
  </label>
      <br>
      <!-- and so on for all districts in Andhra Pradesh -->
    </div>
    <div id="arunachal-pradesh" style="display: none;">
      <label>
        <input type="checkbox" name="district" value="Tawang"> Tawang
      </label>
      <br>
      <label>
        <input type="checkbox" name="district" value="West Kameng"> West Kameng
      </label>
      <br>
      <label>
        <input type="checkbox" name="district" value="East Kameng"> East Kameng
      </label>
      <br>
      <!-- and so on for all districts in Arunachal Pradesh -->
    </div>
    <div id="assam" style="display: none;">
      <label>
        <input type="checkbox" name="district" value="Baksa"> Baksa
      </label>
      <br>
      <label>
        <input type="checkbox" name="district" value="Barpeta"> Barpeta
      </label>
      <br>
      <label>
        <input type="checkbox" name="district" value="Bongaigaon"> Bongaigaon
      </label>
      <br>
      <!-- and so on for all districts in Assam -->
    </div>
    <!-- and so on for all states... -->
  </fieldset>
  <br>
  <button type="button" onclick="showSelected()">Show Selected</button>
</form>
