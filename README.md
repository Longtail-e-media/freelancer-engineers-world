# synhawk 3.0.2 patch

synhawk 3.0.2 update

Revision version changes <br/>
-integrate FB reel in popup module
-implement logic to show nav button in popup carousel 



# synhawk 3.0.0 patch

synhawk 3.0.0 update

the main version signifies the major changes in the synhawk system: eg: going from 2.9.9 to 3.0.0<br/>
the secondary version signifies changes such as adding new module which will be used in other major properties as well eg: going form 2.8.9 to 2.9.0<br/>
the final numeric version signifies the changes inside the module which will be used in other major projects eg: going from 2.9.0 to 2.9.1<br/>

Major version changes<br/>
-updated php version from 7.3 to 8.2<br/>
--changes in session.php<br/>
---need to define the variable before using it before it was possible to define it when you use it eg. line 4<br/>
--changes in function.php<br/>
---remove magic code eg.line no -800<br/>
---change method to define time format eg. line no.97<br/>
--changes in php.ini<br/>
---addding gd extension to allow uploadify to work in php 8.2<br/>
-other major changes were carried out from 8.1 changes done previously by Swarna shakya<br/>

Minor version changes
-changes in module<br/>
--added module.header<br/>
---added dynamic logo<br/>
---added dynamic menu<br/>
---added dynamic social links<br/>
--added module.footer<br/>
---added dynamic brief content<br/>
---added dyanmic footer menu<br/>
---added dynamic soical footer<br/>
--added module.faq<br/>
--added module.mainservice<br/>
--added module.nearby<br/>
--added module.ota<br/>
--added module.timeline<br/>
--added module.vacency<br/>

Revision version changes<br/>
-possible to uplaod webp images(chanegs in uploadify.php)<br/>
-possible to uplaod pdf(chanegs in uploadify.php)<br/>
-possible to sort features chanegs in subpackges<br/>
-added dynamic banner for static pages(contact,gallery, facilities and more)<br/>
-added facebook pixel section<br/>
-added google pixel section<br/>
-added schedule managent in package(silverline)<br/>
-added method to attach pdf to mail though form <br/>
-added method to only provide premission to super admin<br/>
-added method to recive an email to support when forgot pass word<br/>
-realtime property change function in siddartha where selecting cafe or hotel will change the needed data<br/> 
-las and siddartha(review section) where property selection will change the data according to the drop down data select<br/>

-fixed issues with multiple depreceated code going from 7.3 php to 8.2 php<br/>
-added multi and none option in offer module<br/>
-added multi and none option in offer<br/>











