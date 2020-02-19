<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');
?>

<!DOCTYPE html>

<html>
Name: <br>
<input type="text" id="summName" name="summName" placeholder="Enter your summoner's name" required/><br />
<input type="submit" onclick="summonerLookUp();" name="submit" value="Submit" />

<br />Summoner Level: <span id="sLevel"></span>

<br />Summoner ID: <span id="sID"></span>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

function summonerLookUp() {
    var SUMMONER_NAME = "";
    SUMMONER_NAME = $("#summName").val();

    var API_KEY = "RGAPI-5b242bc4-1cf1-47c7-91b6-508c48be2476";

    if (SUMMONER_NAME !== "") {

        $.ajax({
            url: 'https://na1.api.riotgames.com/lol/summoner/v4/summoners/by-name/Bakedbow?api_key=RGAPI-5b242bc4-1cf1-47c7-91b6-508c48be2476',
            type: 'GET',
            dataType: 'json',
            data: {

            },
            success: function (json) {
                var SUMMONER_NAME_NOSPACES = SUMMONER_NAME.replace(" ", "");

                SUMMONER_NAME_NOSPACES = SUMMONER_NAME_NOSPACES.toLowerCase().trim();

                summonerLevel = json[SUMMONER_NAME_NOSPACES].summonerLevel;
                summonerID = json[SUMMONER_NAME_NOSPACES].id;

                document.getElementById("sLevel").innerHTML = summonerLevel;
                document.getElementById("sID").innerHTML = summonerID;

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("error getting Summoner data!");
            }
        });
    } else {}
}

</script>
