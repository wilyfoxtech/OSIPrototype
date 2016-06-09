# Wily Fox's  ADPQ Prototype

#### Prototype URL - 
http://adpq-poc.azurewebsites.net/ 

Wily Fox Technologies’ prototype application is a demonstration of our open agile software development approach to the requirements outlined in the Request for Information (RFI) #75001, Agile Development Pre-Qualified (ADPQ) Vendor Pool.  This working prototype allows parents of foster kids to establish and manage a profile that they set up, view children’s residential facilities within their zip code, and securely communicate with a case worker using the application.  The application leverages an open data set through California Health & Human Services API, which includes data for foster family agency locations, and was developed using an agile approach to software development. 

## Our Approach
On the onset of our effort we selected one leader for our team, Phil Smith, to have the authority and responsibility for the implementation of the working prototype.  We then set out on assigning roles for the rest of the team, which follow:
 
 1. Product Manager - Phil Smith 
 2. Technical Architect – Phil Smith
 3. Interaction Designer/User Researcher – Ram Dongre
 4. Writer – Phil Smith
 5. Business Analyst – Sri 
 6. Front End Web Developer – Ram Dongre
 7. Backend Web Developer – Kirk Noe
 8. DevOps Engineer – Ram Dongre
 9. Usability Tester/End User – Carole McCormick
 
## Understand What People Need
Once the roles were established we put our efforts to addressing what the prototype needed to achieve to meet the business and human needs of the effort.  To help guide us we aligned the recommendations in the U.S. Digital Services Playbook with the Wily Fox agile implementation approach.  The first “human-centered design” (HCD) technique the team used was visioning/brainstorming where we discussed the broad goals of what the application needed to meet: establishing a profile, viewing facilities within a zip code, and facilitate secure communication between case workers and foster parents.  

Once the goals of the prototype were understood we included people (our end users) not directly involved in developing the application and conducted User Interviews/Focus Group Sessions (second HCD) with them to provide clarification to the broad goals of the prototype that had been identified by the team.  

After the interviews we developed User Stories (third HCD) to refine the understanding of the end user’s expectations and that the goals of the application coincided with expectations.  The process also provides an excellent opportunity to begin involving stakeholders in the iterative implementation process. It also begins to level set expectations within the group, and set implementation priorities to feed into the team’s product and sprint backlogs.  

Once the user stories and functionality had been identified and prioritized the team set out on implementing the prototype, which we split into three sprints.  At the end of each sprint we conducted Usability Testing (forth HCD) with our end users during our ‘sprint review meetings’.  

####Overview of our Agile approach:
https://github.com/wilyfoxtech/OSIPrototype/tree/master/Scrum-Approach 

## Implementation Techniques
Along with our iterative implementation approach to developing the prototype the team utilized the Bootstrap framework to provide a foundation for the style guide.  Bootstrap provided a solid design foundation that the team leveraged to meet the needs of the user interface, and to refine the responsive design of the application.

The team also leveraged jQuery in the implementation to help make the application more versatile and extensible.  It provided our implementation with a flexible API to help the application perform well across a variety of web browsers.  
Beside using Bootstrap and jQuery, two modern open-source technologies, our team also used Linux, Apache, MySQL, PHP (LAMP), Web Matrix, and Azure to implement and host our prototype application.  One quick note regarding Web Matrix, it allows us to deploy the entire solution easily as one package to the VM (as a container).

The technical team deployed the solution to the Wily Fox Azure platform, as we have used the platform in the past to host a variety of websites and applications.  We provisioned a new dedicated LAMP Virtual Machine (VM) to host the application through a publically accessible URL.  The Azure foundation let us easily provision resources as it is an IaaS, and the provisioned VM provided us as PaaS.

One of the benefits of deploying the entirety of the application in the Wily Fox Azure platform, was that we already had a mature and stable infrastructure.  The established IaaS included our configuration management solution Team Foundation Server with integrated services to the platform where we can continuously monitor every application, solution, virtual machine, security configuration, and resource.  In turn the dedicated VM has continuous monitoring on many levels and is integrated with our source control system to facilitate ease of deployments and testing automation.  Besides using our established source control system, we have published the application and artifacts to this GitHub repository. 

Installation and deployment instructions: 
https://github.com/wilyfoxtech/OSIPrototype/blob/master/Application_Installation_Document.txt 

Please refer to the License agreement in the repository and to the platform offering information found using the following link.
https://azure.microsoft.com/en-us/free/pricing-offers/ 



