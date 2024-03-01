<?php
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");
 
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);


$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $reply = $fetch_data['replies'];
    echo $reply;
} else {
   
    $default_responses = array(
        "hello" => "Hi there! How can I assist you?",
        "hi" => "Hello! How can I help?",
        "hey" => "Hey! What can I do for you?",
        "what are you doing" => "I'm here to assist you. Ask me anything!",
        "good night" => "ok take some rest now",
        "i love you" => "WTF , But i hate you",
        "see you" => "oooh seriously , but i don't wanna see you!",
        "see u" => "oooh seriously , but i don't wanna see you!",






        "how are you" => "I'm just a computer program, but thanks for asking!",
        "good morning" => "Good morning! How can I assist you today?",
        "good afternoon" => "Good afternoon! What can I do for you?",
        "good evening" => "Good evening! How may I help you?",
        "how's it going" => "It's going well. How about you?",
        "tell me a joke" => "Why don't scientists trust atoms? Because they make up everything!",
        "who are you" => "I am a friendly chatbot here to help you.",
        "thank you" => "You're welcome! If you have more questions, feel free to ask.",
        "bye" => "Goodbye! Have a great day!",
   
        "nice to meet you" => "Nice to meet you too!",
        "ask me anything" => "Sure, feel free to ask me anything!",
        "you're funny" => "Glad you think so! Here's another one: Why did the chicken go to the seance? To talk to the other side!",
        "what's up" => "Not much, just here to chat. How about you?",
        "can you dance" => "I wish! But I can certainly keep you entertained with a virtual dance.",
        "how old are you" => "I don't have an age. I'm always learning and evolving!",
        "what's the meaning of life" => "The meaning of life is subjective and varies for each person. What does it mean to you?",
        "you're the best" => "Thank you! You're pretty awesome too!",
        "how do you work" => "I operate based on algorithms and programming. Ask me a question, and I'll do my best to help!",
        

        "where are you from" => "I exist in the digital realm, so I don't have a physical location!",
        "do you have siblings" => "In a way, I have many digital siblings, but we're all unique!",
        "what's your favorite color" => "I don't have a favorite color, but I can generate any color you like!",
        "can you sing" => "I can't sing, but I can certainly provide information or tell you a joke!",
        "are you a morning person" => "I'm always ready to assist, whether it's morning, afternoon, or evening!",
        "tell me a fun fact" => "The shortest war in history was between Britain and Zanzibar in 1896. Zanzibar surrendered after 38 minutes!",
       
    );

   
    $lowercase_message = strtolower($getMesg);

    foreach ($default_responses as $trigger => $response) {
        if (strpos($lowercase_message, strtolower($trigger)) !== false) {
            echo $response;
            exit;
        }
    }

   
    echo "I'm sorry, I didn't understand that.";
}
?>
