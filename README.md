# slackcommute
  Commute time script for Slack slash command

Setup:
  Configure your slash command in Slack: -recommend using */commute*-
    
    https://api.slack.com/slash-commands
     
      Note the Token created (this is a unique validation token for the application, not the API token or site OAuth token)
      It can also be found later under the "Basic Information" tab of the app configuration
     
  Define variables in the script:
  
     #Google map API key
     $key="YOUR_KEY_HERE";
     #specify origin of commute (i.e. office location. Encode with +)
     $origin="400+broad+st+seattle+wa+98109";
     #specify unix epoch time or "now"
     $dtime="now";
     #specify optimistic, pessimistic or best_guess
     $model="best_guess";
     #specify mode of travel - walking, biking, driving, transit (note transit requires transit type)
     $mode="driving";
     #specify metric or imperial
     $units="imperial";
