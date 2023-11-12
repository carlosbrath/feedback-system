var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode) {
  var form = ajaxForm([
    ['skipCounter', skipCounter],
    ['takeAmount', takeAmount],
    ['mode', mode],
  ]);

  var functionsOnSuccess = [
    [renderConnections, ['response', 'requests']],
  ];

  ajax('/getRequests', 'POST', functionsOnSuccess, form);
}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections() {
  // show skeletons
  // hide content

  var form = ajaxForm([
    ['skipCounter', skipCounter],
    ['takeAmount', takeAmount],
  ]);

  var functionsOnSuccess = [
    [renderConnections, ['response','connections']],
  ];

  ajax('/connections', 'POST', functionsOnSuccess, form);
}

function renderConnections(connections, render) {
  // hide skeletons
  // show content
  // console.log(render);
  renderComponenets(connections, render)
  // $('#content').html(connections);
}

function getMoreConnections() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
  // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getSuggestions() {
  var form = ajaxForm([
    ['skipCounter', skipCounter],
    ['takeAmount', takeAmount],
  ]);

  var functionsOnSuccess = [
    [renderConnections, ['response', 'suggestions']],
  ];

  ajax('/suggestions', 'GET', functionsOnSuccess, form);
}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(userId, suggestionId) {
  // your code here...
  var form = ajaxForm([
    ['skipCounter', skipCounter],
    ['takeAmount', takeAmount],
    ['userId', userId],
    ['suggestionId', suggestionId],
  ]);

  var functionsOnSuccess = [
    [renderConnections, ['sendRequest']],
  ];

  ajax('/sendRequest', 'POST', functionsOnSuccess, form);
}

function deleteRequest(userId, requestId) {
  // your code here...
}

function acceptRequest(userId, requestId) {
  // your code here...
}

function removeConnection(userId, connectionId) {
  // your code here...
}

$(function () {
  //getSuggestions();
});