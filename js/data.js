var teams = [];

function getFixtures(data){
	var games = [];
	var fixture = [];
	fixture = data.fixtures;
	//Daten aus http request werden in ein array geschrieben.
	for (var i = 0; i < fixture.length; i++) {
		var results = [];
		var status = fixture[i].status
		results = fixture[i].result;
		var goalHome = null;
		var goalAway = null;
		var matchday = fixture[i].matchday;
		
		if(status == "FINISHED"){
			goalHome = results.goalsHomeTeam;
			goalAway = results.goalsAwayTeam;
		}
		
		games.push({ status: status, matchday: matchday,homeTeam: fixture[i].homeTeamName, homeLogo: getLogo(fixture[i].homeTeamName), awayTeam: fixture[i].awayTeamName, awayLogo: getLogo(fixture[i].awayTeamName), goalHome: goalHome, goalAway: goalAway});
	}
	
	return games;
}

function getTeams(data){

	var team = [];
	team = data.teams;
	
	for (var i = 0; i < team.length; i++) {
		var name = team[i].name;
		var logo = team[i].crestUrl;
		
		teams.push({name: name, logo: logo});
	}
}

function getLogo(teamName){
	var url;
	for (var i = 0; i < teams.length; i++) {
		if(teamName == teams[i].name){
			url = teams[i].logo;
		}
	}
	
	return url;
}

function showResults(games){
	var matchdays = [];
	var all = "All";
	matchdays.push(all);
	$("#selectRes").append("<option value='" + all + "'>" + all + "</option>");
	
	for (var i = 0; i < games.length; i++) {
		if(games[i].goalHome != null){
			$(".resultTable").append("<tr value='" + games[i].matchday + "'><td class='teamLogo'><img src='" + games[i].homeLogo + "' width='40px' height'40px'></td><td class='teamName'>" + games[i].homeTeam + "</td><td class='result'>" + games[i].goalHome + "</td><td>:</td><td class='result'>" + games[i].goalAway + "</td><td class='teamName' style='text-align:right'>" + games[i].awayTeam + "</td><td class='teamLogo'><img src='" + games[i].awayLogo + "' width='40px' height'40px'></td></tr>");
		}
		
		if(matchdays.indexOf(games[i].matchday) < 0 ){
			matchdays.push(games[i].matchday);
			$("#selectRes").append("<option value='" + games[i].matchday + "'>" + games[i].matchday + "</option>");
		}
		
	}
}




$(document).ready(function(){
	var data = null;
	var games = [];
	
	//ajax Http request für die Teams
	$.ajax({
		headers: { 'X-Auth-Token': '89795b5aca0940858b81519093e81592' },
  		url: "http://api.football-data.org/v1/soccerseasons/394/teams",
  		data: data,
  		method:"GET",
  		dataType: "json",
		async: false
	}).done(function(data){
		if(data)
		{
			getTeams(data);
		}
	});
	
	
	//ajax Http request für die Spielresultate
	$.ajax({
	//Hier ist der Key für den zugriff auf die Rest API
		headers: { 'X-Auth-Token': '89795b5aca0940858b81519093e81592' },
  		url: "http://api.football-data.org/v1/soccerseasons/394/fixtures",
  		data: data,
  		method:"GET",
  		dataType: "json",
		async: false
	}).done(function(data){
		if(data)
		{
			games = getFixtures(data);
			
		}
	});
	
	showResults(games);
});