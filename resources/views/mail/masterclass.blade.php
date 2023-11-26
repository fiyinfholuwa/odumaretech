
<div  style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border-radius:20px; background-color:#EDE9E8; box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px; color:black; ">
    <div style="text-align:center">
    <img style="width:200px; height:80px; border-radius:10px;" src="https://odumaretech.com/frontend/assets/images/synta_logo.png"/>
    </div>
    
  <p>Congratulations! You have been exclusively selected to join our upcoming webinar at OdumareTech. We're excited to have you on board for this special event!</p>
  <p>The webinar will take place on <span style="font-weight:700;">{{ $mailData['date'] }}</span> at <span style="font-weight:700;">{{ $mailData['time'] }} WAT</span>. We have prepared an insightful session on <span style="font-weight:700;">{{ $mailData['title'] }}</span> that will empower you with valuable knowledge and practical insights.</p>
  <p>
  To access the webinar, simply click on the personalized link provided below:</br>
  {{ $mailData['meeting_link'] }}
  </p>
  
  <p>
  We encourage you to mark your calendar and join us promptly to make the most of this unique learning opportunity.

Should you have any questions or require assistance, please don't hesitate to reach out to us. We are here to support you.

Thank you for being a valued part of our community, and we look forward to your active participation in the webinar!

  </p>
  <p>Best regards,</p>
  OdumareTech
</p>
</div>

    

    







