var questions = [
  	{
    	label : 'What is the capital of Norway ?',
    	options : ['Stockholm', 'Oslo', 'Copenhagen'],
    	answer : ['Oslo']
    	forceAnswer : true
   },
  	{
    	label : 'World champion, WC South Africa 2010 ?',
    	options : ['Brazil', 'Netherlands', 'Spain'],
    	answer : ['Spain']
   },
  	{
    	label : 'Prime minister(s) of England during World War II ?',
    	options : ['Clement Attlee', 'Sir Winston Churchill', 'Neville Chamberlain', 'Sir Anthony Eden'],
    	answer : [1,2] // refers to the second and third option
   }
,
  	{
    	label : 'United States has how many states',
    	options : ['49','50','51'],
    	answer : ['50']
   },
  	{
    	label : 'A crocodile is a member of which family ?',
    	options : ['amphibian','reptile', 'vermin'],
    	answer : ['reptile']
   },
   {
     label: 'In which year did Atlanta(US) arrange the summer olympics ?',
     options : ['1992','1996','2000'],
     answer :['1996']
   }
]

function showAnswerAlert() {
  	$('error').set('html', 'You have to answer before you continue to the next question');
}
function clearErrorBox() {
  	$('error').set('html','');
}

var quizMaker = new DG.QuizMaker({
  	questions : questions,
  	el : 'questions',
  	listeners : {
  	'finish' : showScore,
  	'missinganswer' : showAnswerAlert,
  	'sendanswer' : clearErrorBox
}
});
{
  numCorrectAnswers : 4
  numQuestions : 6
  percentageCorrectAnswers : 67
  incorrectAnswers : [
    {
      questionNumber : 1
      label : What is the capital of Norway
      correctAnswer : Oslo
      userAnswer : Copenhagen
  },
    {
      questionNumber : 3
      label : Prime minister of england during WWII
      correctAnswer : Churchill, Chamberlain
      userAnswer : Churchill, Eden
  }
]
}
