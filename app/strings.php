<?php

// In order to support early translations tasks, this file contains the strings for features/pages that have yet to be
// implemented.

return [
    // Home Page - https://github.com/accessibility-exchange/platform/issues/750
    '0.0 Home Page' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A3399
        'HomePage' => [
            __('Contrast'),
            __('Available :start to :end :timeZone'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A3283
        'HomePage/FRO’s' => [
            __('Frequently asked questions'),
            __('What services does The Accessibility Exchange offer?'),
            __('What are the different roles that are played in The Accessibility Exchange?'),
            __('Who can play these roles?'),
            __('How does The Accessibility Exchange define disability?'),
            __('How will my privacy be protected on this website?'),
            __('Can I learn more about participating in a consultation?'),
            __('How does The Accessibility Exchange assist Regulated Organizations interested in recruiting and engaging people with disabilities, Deaf people, and supporters in consultations?'),
            __('Is there training on how to design and facilitate and effective consultation?'),
            __('How will my access needs be met during a consultation?'),
            __('Does it cost Regulated Organizations to use The Accessibility Exchange services?'),
            __('Request an introductory phone call'),
            __('Request a call'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2336%3A64484
        'HomePage/participants' => [
            __('What are the different roles that are played in The Accessibility Exchange'),
        ],
    ],

    '1.0 Registration + My dashboard + translations' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A4220
        'All/Registration/Password' => [
            __('I agree with the [terms of service](:url) or using The Accessibility Exchange'),
            __('I agree with the [privacy policy](:url) or using The Accessibility Exchange'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3706%3A98663
        'Dashboard/Ind-CP/Onboarding start' => [
            __('Role|Roles'),
            __('Watch introduction video again'),
            __('Customize this website’s accessibility'),
            __('Change colour contrast, turn on text to speech, and turn on Sign Language videos.'),
            __('Customize'),
            __('Enter your collaboration preferences'),
            __('Please complete this section so that you can be set up to participate in consultations.'),
            __('Not started yet'),
            __('Attend an orientation session'),
            __('Please attend an orientation session for your roles as :role.|Please attend an orientation session for each of your roles as :firstRole and :lastRole.'),
            __('Projects I’m participating in as a Consultation Participant.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1780%3A48437
        'Dashboard/Ind-CP/Enter personal info-1' => [
            __('Please enter your collaboration preferences'),
            __('Matching information'),
            __('Optional'),
            __('Back to dashboard'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1790%3A50075
        'Dashboard/Ind-CP/Onboarding done' => [
            __('Projects I’m participating in as a :role.'),
            __('Project invitation'),
            __('You’ve been invited to participate in :organization project, :project. They would like you to join for the :engagement engagement.'),
            __('Please respond by :date.'),
            __('Update your matching information'),
            __('It’s been at least a year since you’ve updated your matching information. Please update this so you are matched to the appropriate projects.'),
            __('Update matching information'),
            __('Update your communication and consultation preferences'),
            __('It’s been at least a year since you’ve updated your communication and consultation preferences. Please update this so you are matched to the appropriate projects.'),
            __('Update preferences'),
        ],

        // AC CC - https://github.com/accessibility-exchange/platform/issues/926
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1784%3A51410
        'Dashboard/Ind-AC+CC/Onboarding start' => [
            __('Create a public page'),
            __('Please create your page to share more about who you are, your experiences, and your interests.'),
            __('This will help people know what to expect when working with you.'),
            __('Review and publish your public page'),
            __('Before you can use your account, you must have completed all the previous steps.'),
            __('Public page'),
            __('Projects I’m working on as an Accessibility Consultant or Community Connector.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1784%3A51670
        'Dashboard/Ind-AC+CC/Enter collab preferences' => [
            __('These details will help people know what to expect when working with you.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3706%3A98442
        'Dashboard/Ind-AC+CC/Onboarding in progress-3' => [
            __('Done'),
            __('Ready'),
        ],

        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3706%3A99635
        'Dashboard/Ind - all/Onboarding start' => [
            __('General'),
            __('Enter your personal information'),
            __('Please complete this section so that you can be set up to participate in consultations and work on projects.'),
            __('Create a public profile'),
            __('Please create your profile to share more about who you are, your experiences, and your interests.'),
        ],

        // Community Org - https://github.com/accessibility-exchange/platform/issues/927
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2456%3A64126
        'Dashboard/CommOrg/create your org - 5' => [
            __('Error'),
            __('There is already an organization with the name “:name” registered on this platform. If this is the organization you work for, please contact your colleagues to get an invitation to the organization. If this isn’t the organization you work for, please use a different name.'),
            __('Location: :location'),
            __('Community they serve: :community'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2118%3A56197
        'Dashboard/CommOrg/org admin empty' => [
            __('My organization’s role: :roles'),
            __('Invite others to your organization'),
            __('Please invite others so you can work on projects together.'),
            __('Create your organization’s page'),
            __('Please create your organization’s page so that other members of this website can find you.'),
            __('Projects my organization is participating in as a Consultation Participant.'),
            __('Projects my organization is contracted for as an Accessibility Consultant or Community Connector.'),
            __('Projects my organization is running.'),
            __('My trainings'),
            __('All the training I am doing or have done.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2118%3A56436
        'Dashboard/CommOrg/org admin filled' => [
            __(':numRSVPs new RSVPs to your engagement, :engagement'),
            __('Go to engagement dashboard'),
        ],

        // FRO - https://github.com/accessibility-exchange/platform/issues/928
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2102%3A55056
        'Dashboard/FRO/create new org - 2' => [
            __('(required)*'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2456%3A63929
        'Dashboard/FRO/create new org - 4' => [
            __('Sector: :sector'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1491%3A35377
        'Dashboard/FRO/org admin-empty' => [
            __('Create your first project'),
            __('Plan and share your project with others on this website.'),
        ],

        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2934%3A77739
        'Dashboard/Trainee/empty' => [
            __('Browse trainings'),
            __('Browse all the trainings on this website.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1378%3A22421
        'Dashboard/Trainings' => [
            __('Training by :name'),
            __('Language: :language'),
            __('Completed on :date'),
            __('Download certificate of completion'),
        ],
    ],

    // https://github.com/accessibility-exchange/platform/issues/923
    '2.0 Projects' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2478%3A64920
        'Projects/Individual/Participating' => [
            __('You have been invited to participate in :organization project, :project. They would like you to join for the :engagement engagement.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2478%3A65288
        'Projects/Browse all projects' => [
            __('Search...'),
            __('Cancelled'),
            __('Seeking Consultation Participants'),
            __('Seeking Accessibility Consultants'),
            __('Other disability'),
            __('Service location'),
            __('Payment method'),
            __('Matching service'),
            __('Previous engagement'),
            __('Apply filter'),
            __('Project by :organization'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A5877
        'create new project - 3' => [
            __('Not started'),
            __('Preview'),
            __('Publish project'),
            __('Once you publish your project, others can find it.'),
            __('Unsaved content'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1229%3A13916
        'create new project - 4' => [
            __('Add training'),
            __('Year'),
            __('Month'),
            __('Day'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3326%3A100463
        'Manage project/empty' => [
            __('Surveys'),
            __('Workshops'),
            __('Focus groups'),
            __('more'),
            __('Cancel project'),
            __('You have not determined the selection criteria for the people you seek for this project.'),
            __('Create selection criteria'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3326%3A100939
        'Manage project/filled' => [
            __('Success'),
            __('You have successfully added a new engagement.'),
            __('Create another engagement'),
            __('Disability'),
            __('Cross disability (including people with disabilities, Deaf people, and supporters)'),
            __('Co-design'),
            __('Meeting date :date'),
            __('Location :location'),
            __('Virtual on :tool'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2492%3A63667
        'Manage project/completed project' => [
            __('Warning'),
            __('It looks like your project is complete, based on your project dates. If this is not accurate, please update your project duration dates.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3291%3A103325
        'Manage project/Quotes and agreements' => [
            __('You have not requested an estimate before.'),
            __('Please sign this agreement and send to :email'),
            __('Download agreement'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3291%3A104365
        'Manage project/Quotes and agreements/approved' => [
            __('Something changed?'),
            __('If anything about your projects or engagements have changed, please send a new estimate request.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2477%3A67582
        'Manage project/Suggested steps - learn' => [
            __('Your inclusive and accessible consultation'),
            __('With disability and Deaf communities and hold meaningful consultations'),
            __('About the systemic barriers (laws, policies, practices, and culture) underlying the experiences that consultation participants report'),
            __('Learn how to plan an inclusive and accessible consultation'),
            __('One of the key parts of preparing for your consultation with the disability and Deaf communities is making sure that your consultations are done in an accessible and inclusive way.'),
            __('Ways to do this'),
            __('Here are a few tips on planning your consultation:'),
            __('Define the objectives of your consultation. That is, clearly state what information you are hoping to get out of this consultation.'),
            __('Decide the scope of your consultation, e.g., local, regional, provincial, territorial or national'),
            __('Determine the consultation method, e.g., focus group, online survey, one-to-one interviews, etc.'),
            __('Determine who you would like to participate in your consultation, e.g., people with a similar type of disability, a range of people with different disabilities, Deaf people, Indigenous representation, and/or other identities, etc.'),
            __('Develop a safe and accessible format and process, by addressing questions like:'),
            __('What access supports will be needed?'),
            __('What cultural practices and protocols do we need to be sensitive to?'),
            __('How will conflict be managed?'),
            __('What safety protocol should be used if a participant becomes upset?'),
            __('Who will be the best person to facilitate your consultation?'),
            __('Please see the resource [Planning a Safe, Accessible Consultation](:url).'),
            __('You can address these questions with your accessibility or equity, diversity and inclusion team, or work with an accessibility consultant or the Accessibility Exchange support service.'),
            __('Create an engagement'),
            __('Talk to an Accessibility Consultant'),
            __('If you would like more support in planning your consultation, consider hiring an Accessibility Consultant. An Accessibility Consultant can help you with:'),
            __('Designing the consultation format and process'),
            __('Booking access supports'),
            __('Delivering and facilitating the consultation'),
            __('Note-taking and analysis'),
            __('Writing your consultation report'),
            __('If you are thinking of working with a specific group, for example, Indigenous people with disabilities, it would be a good idea to  hire an Accessibility Consultant from that community.'),
            __('If you would like assistance in arranging for an accessibility consultant, you can [contact the Accessibility Exchange Support team](:url)'),
            __('Browse Accessibility Consultants'),
            __('Browse our resources'),
            __('Please browse our Resources page, to help you plan an accessible and inclusive consultation.'),
            __('Visit our Resource page'),
            __('Resources for this phase'),
            __('Access more resources'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2826%3A74227
        'Manage project/Suggested steps - engage' => [
            __('Engage with the disability and Deaf community and hold meaningful consultations'),
            __('Create and implement inclusive and accessible consultations for your organization'),
            __('Access needs and accommodations'),
            __('Ask participants ahead of time about their access needs for the consultation. You can use an Access Form to get information on what people need to participate. Please see the resource, [Access Form Template](:url). If you need assistance in providing accommodation support, please contact us at [info@accessibilityexchange.ca](:email).'),
            __('Consult people more than once'),
            __('It is a good idea to hold more than one consultation with participants to ensure that you are capturing the information correctly and to provide an opportunity for additional feedback. This will demonstrate to participants that they are being heard, and that their feedback matters.'),
            __('Offer transparency around what is out of scope'),
            __('It is useful to share the objectives with your participants and be clear about the limits of the consultation. This will avoid participants feeling that their feedback is missing from your report. Being clear from the outset will help build trust and foster a good working relationship with your participants.'),
            __('Follow up to build your relationship'),
            __('After the consultation follow up with participants to share next steps and your organization’s plan for implementing their feedback.  This can help foster confidence in your commitment, and an ongoing relationship with your participants, who can be involved in future updates of your accessibility plan.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2826%3A74465
        'Manage project/Suggested steps - Deepen understanding' => [
            __('Deepen understanding of what was learned in consultation through systemic analysis'),
            __('Analyze the outcomes of your consultation with people who are in the context of disability and Deaf groups.'),
            __('Engage a Community Organization to help with analysis'),
            __('Community organizations with expertise in disability and Deaf issues, as well as issues effecting other systemically marginalized populations can help you make sense of your consultation findings. They can help to identify the structural barriers (in law, policy, practice, and culture) that underlay people’s lived/living experience. As well, they can point to strategies for addressing those barriers. Because of their service provision, longstanding engagement with and leadership by people with disabilities and Deaf persons and/or other systemically marginalized groups, community organizations can provide the broader context for interpreting your results. Many also have access to complementary research resources – both quantitative sources, and secondary qualitative information to help you understand how widespread the issues are that participants raise.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2602%3A66737
        'Manage project/Participant selection criteria/cross-disability' => [
            __('You can define who you are looking for here. What you choose here will be applied to all your engagements under this project, unless you want to get more specific in your engagements.'),
            __('Select your criteria'),
            __('Across the country'),
            __('In a specific region'),
            __('In a specific province or territory or city or town'),
            __('Add another location'),
            __('Disability and Deaf groups'),
            __('Yes, I’m interested in a specific disability or Deaf group'),
            __('Other experiences or identities'),
            __('Disability or Deaf groups'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2602%3A65596
        'Manage project/Participant selection criteria/specific disability' => [
            __('Select specific provinces or territories'),
            __('Select specific cities or towns'),
            __('Please note that if you want to reach a specific identity group, you will not be able to use our matching service. You can reach them through an open call project, or go through a Community Connector or community organization.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3003%3A78979
        'Cancel engagement - recruitment' => [
            __('Email: :email'),
            __('Phone: :phone'),
            __('Hours: :start to :end :timeZone'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2727%3A74124
        'Engagement/algorithm/invitation/accept' => [
            __('Change language'),
            __('Address:'),
            __('Further directions:'),
            __('Software:'),
            __('Link to join:'),
            __('Additional information to join:'),
            __('Zoom ID:'),
            __('Zoom password:'),
            __('Payment amount'),
            __('Each participant will be paid :pay.'),
            __('Documents'),
            __('Participant consent forms'),
            __('Please fill this out and email it back to us for our first meeting together.'),
            __('Participant non-disclosure agreement'),
            __('Service organization'),
            __('Do you have concerns about the engagement or the organization running it? We can help solve problems and mediate.'),
            __('Hours: :start - :end :timeZone'),
            __('Other engagements for this project'),
            __('Go to project page'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2759%3A81269
        'Engagement/algorithm/invitation/declined' => [
            __('This engagement is a volunteer engagement. There will be no monetary payment.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3326%3A101223
        'Manage engagement/open call/empty' => [
            __('Cancel engagement'),
            __(':count access needs'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2613%3A70683
        'Manage engagement/open call/create invitation' => [
            __('Please sign up for this engagement by:'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2723%3A71437
        'Engagement/open call' => [
            __('This survey will be provided in the following formats:'),
            __('Printed documents'),
            __('Digital'),
            __('Please sign up for this engagement by :date.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3973%3A95155
        'Engagement/public/CC-6' => [
            __('Accept invitation'),
            __('You have successfully accepted your invitation.'),
            __('Your name and your contact information have been shared with :name.'),
            __('Your access needs'),
            __('What’s been shared anonymously'),
            __('The following access needs have been shared with :name anonymously. They will not know it is you who requested them.'),
            __('Sign language translation - ASL'),
            __('Record responses at my own pace'),
            __('What needs your permission to share'),
            __('In order for :name to meet the following access needs, they will need to know who requested them. Do you give permission to share it is you who requested the following access needs?'),
            __('Follow up call or email'),
            __('Please [update your access needs](:url) if they have changed.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2727%3A73024
        'Engagement/open call/sign up-5' => [
            __('This survey will be provided in the following digital formats:'),
            __('Editable PDF document'),
            __('Online form, such as survey monkey or google forms'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2697%3A69398
        'Manage engagement/open call/participants-confirmed' => [
            __('Demographic breakdown'),
            __('Note'),
            __('(Support person, :name)'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2697%3A69981
        'Manage engagement/open call/participants-access needs' => [
            __('Sign language translation - :language'),
            __('Written language translation - :language'),
            __('Need someone to call and walk through information'),
            __('Reminders (for events or for submitting engagement documents)'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3973%3A93375
        'Manage engagement/open call/demographic breakdown' => [
            __('The group of participants who have accepted your invitation include:'),
            __('Locations'),
            __('Your participants are from the following locations in Canada.'),
            __('Groups'),
            __(':percentage of your participants fall into more than one of these groups.'),
            __('Temporary'),
            __('Other identities included'),
            __(':percentage of your participants identify with more than one of the following.'),
            __('Your participants are from the following age groups.'),
            __('Your participants use the following languages.'),
            __('Other languages'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3973%3A93818
        'Manage engagement/open call/demographic breakdown __ b' => [
            __('The demographic breakdown of your confirmed participants will show when your sign up deadline has passed. Please come back and check again at that time.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2730%3A73293
        'Engagement/private/CC' => [
            __('Interviews will take place between :start - :end'),
            __('Interview at their own pace'),
            __('The Regulated Organization sends out a list of questions, and you can respond to them at your own pace.'),
            __('Participants taking part in **real time interviews** will be paid :pay.'),
            __('Participants taking part in **interviewing at their own pace** will be paid :pay.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3948%3A94318
        'CC accepting invitation' => [
            __('Start adding participants to this engagement'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3948%3A94591
        'Manage engagement/CC view' => [
            __('Engagement details'),
            __('Last updated on :date.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2745%3A77160
        'Manage engagement/CC/participants/add-1' => [
            __('This is the email that the invitation will be sent to.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2745%3A78454
        'Manage engagement/CC/participants/add-4' => [
            __('You have successfully invited :name to participate in this engagement.'),
            __('N/A'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2732%3A73670
        'Manage engagement/CC/participants/add-4 __ b' => [
            __('You have been invited to participate in this engagement. Please respond by :date.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2745%3A76657
        'Engagement/public/CC-6 __ b' => [
            __('Your consultation preferences'),
            __('The following preferences have been shared with :name.'),
            __('Please [update your communication and consultation preferences](:url) if they have changed.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2733%3A74754
        'Engagement/public/CC-7' => [
            __('You have successfully accepted your invitation. You are now a Consultation Participant for this engagement.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2782%3A75350
        'Manage engagement/CO/Successfully added' => [
            __('You have successfully added :organization as the Community Organization you are consulting with for this engagement.'),
            __('Representative community organization'),
        ],
    ],

    // https://github.com/accessibility-exchange/platform/issues/929
    '3.0 People and organizations' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2221%3A58998
        'Explore' => [
            __('Browse by services'),
            __('Professional consultants who can help Regulated Organizations plan and run the consultation, analyze collected information, write accessibility reports, and book accessibility service providers.'),
            __('Individuals or Community Organizations that can help find Consultation Participants for projects.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A10473
        'Explore/individuals' => [
            __('People with lived experience of disability or being Deaf.'),
            __('Search by name...'),
            __('Apply filters'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1309%3A18647
        'Explore/individuals/search results' => [
            __(':count results for'),
            __('Search term'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1301%3A17738
        'Explore/CommOrgs' => [
            __('Disability and Deaf organizations, and civil society organizations.'),
            __('Type of community organization'),
            __('Read more about these types of organizations'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2221%3A61802
        'Explore/AC' => [
            __('Search name or lived experience...'),
            __('Individual or organization'),
            __('Organizations'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2733%3A77694
        'Explore/CC' => [
            __('Ethnoracial group they can connect to'),
            __('Other identity groups they can connect to'),
            __('Language groups they can connect to'),
            __('Age groups they can connect to'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A10580
        'Explore/FRO' => [
            __('Government, businesses, and nonprofit organizations, which are regulated by the federal government, here to work on accessibility.'),
        ],
    ],

    //https://github.com/accessibility-exchange/platform/issues/930
    '4.0 Resources' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3117%3A94550
        'Resources Hub/Landing page with CCRW' => [
            __('Resources by role'),
            __('Here you may find resources helpful for participating in a consultation.'),
            __('Browse resources for Consultation Participants'),
            __('Community Connectors and Accessibility Consultants'),
            __('Here you may find resources of benefit to Accessibility Consultants and Community Connectors.'),
            __('Browse resources for Community Connectors and Accessibility Consultants'),
            __('Here you may find resources to help support your members in participating in consultations.'),
            __('Browse resources for community organizations'),
            __('Here you may find resources to assist in running inclusive and accessible consultations.'),
            __('Browse resources for Regulated Organizations'),
            __('Here you may find resources for employees of the Regulated Organizations.'),
            __('Browse resources by :creator'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3117%3A94816
        'Resources Hub/CCRW collections' => [
            __('Formats'),
            __('Format: :format'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A13370
        'Resources Hub/Search results' => [
            __(':count results for “:search” found'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2838%3A76275
        'Resources Hub/Resource view/Text' => [
            __('Authored by :author'),
            __('Added on :date'),
            __('Change resource format and language'),
            __('Table of contents'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2838%3A76528
        'Resources Hub/Resource view/switch' => [
            __('Switch to:'),
            __('Download:'),
            __('(current format)'),
            __('Microsoft Word'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2858%3A75935
        'Resources/video' => [
            __('Author'),
            __('Guide'),
            __('Published on'),
            __('Transcript'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2860%3A79451
        'Resources/word document' => [
            __('Download :language document'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2925%3A77648
        'Resources/word document __ b' => [
            __('Visit :language website'),
            __('Access :language version'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A19472
        'Resources/CHHA - 1' => [
            __('About this course'),
            __('Walkthrough'),
            __('Webinars'),
            __('Resource type by :author'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A19857
        'Resources/CHHA - 2' => [
            __('Other webinars'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A20334
        'Resources/CHHA - 3' => [
            __('Have you completed the webinar?'),
            __('Please take this quick quiz to confirm your understanding. Once you pass the quiz, you will receive credit for finishing the webinar.'),
            __('Take the quiz'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A21199
        'Resources/CHHA - 4' => [
            __('Quiz'),
            __('Question :current of :total'),
            __('Submit'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A21518
        'Resources/CHHA - 5' => [
            __('Correct answer!'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1378%3A22163
        'Resources/CHHA - 6' => [
            __('Please try again.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1378%3A22265
        'Resources/CHHA - 7' => [
            __('Quiz results'),
            __('Congratulations! You have passed the quiz.'),
            __(':correct out of :total questions were answered correctly. You have now completed this webinar. You have :unfinished more webinars to finish in order to complete this training.'),
            __('Back to training home page'),
            __('Next webinar'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1474%3A32256
        'Resources/CHHA - 8' => [
            __(':correct out of :total questions were answered correctly. You have now completed all the webinars in this course.'),
            __('Download your certificate'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A20602
        'Resources/CHHA - 9' => [
            __('For the :sector sector'),
            __('Quiz completed'),
            __('Watched'),
            __('Please take the quiz to complete'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1368%3A21765
        'Resources/CHHA - 10' => [
            __('Congratulations! You have now completed this course.'),
        ],
    ],

    //https://github.com/accessibility-exchange/platform/issues/931
    '5.0 Settings' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1790%3A51698
        'Settings/Access needs' => [
            __('Gender neutral washroom'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1252%3A14249
        'Settings/Comm preferences - 1' => [
            __('* means that a field is required.'),
            __('Are you able to attend consultations in real-time, or do you prefer to receive the materials (ex. questions, discussion topics) and record your responses at your own pace?'),
            __('Real-time consultations'),
            __('Virtual - web conference'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2327%3A63742
        'Sing language player - HomePage' => [
            __('Accessibility preferences'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2265%3A74852
        'Settings/Website access' => [
            __('Reset'),
            __('Sign Language translations'),
            __('If a Sign Language video translation is available, you will see a button in line with the website content. Pressing that button will load the Sign Language video.'),
            __('American Sign Language (ASL)'),
            __('Langue des signes québécoise (LSQ)'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1282%3A15836
        'Modal/Unblock' => [
            __('Unblock :organization'),
            __('When you unblock someone, they will be able to:'),
            __('communicate with you'),
            __('Are you sure you want to unblock them?'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2308%3A62225
        'Settings/Individual/Delete your account' => [
            __('Once you delete your account, you will not be able to recover it'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3993%3A97308
        'Settings/CommOrg/Delete your account' => [
            __('you will no longer be able to access information about the :count projects you are contracted for'),
            __('you will no longer be able to access information about the :count projects you are participating in'),
            __('you will no longer be able to manage the :count projects you are running'),
            __('you will no longer be able to access your :count training certificates'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2221%3A62865
        'Settings/FRO' => [
            __('Delete your organization'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1796%3A52675
        'Settings/Roles and permissions' => [
            __('Your role: :role'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2448%3A64859
        'Remove member modal' => [
            __('Remove :name from your organization'),
            __('Are you sure you want to remove :name from :organization? You cannot undo this.'),
            __('Yes, remove'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=3439%3A98257
        'Settings/CommOrg/notifications/manage-EXPANDED' => [
            __('Would you like to be notified directly when you are assigned a new role by your organization admin?'),
            __('Notify me on this website'),
            __('Directly contact me or my support person'),
            __('Please indicate how you would like to be notified of new participants being added to your engagements.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2221%3A63137
        'Settings/FRO/Delete your org' => [
            __('Are you sure you want to delete your organization, :organization?'),
            __('Everything in your organization will be deleted as well:'),
            __(':count projects'),
            __(':count engagements'),
            __(':count members of your organization'),
            __('your public profile will be removed from the website'),
            __('This is not the same as deleting your individual account for yourself. If you would like to delete your individual account, please go to [Delete my account](:url).'),
            __('Once you delete your organization profile, there will be a grace period of 30 days, during which you could recover it. After 30 days, it will be deleted forever — this cannot be reversed.'),
            __('Delete my organization'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2448%3A64877
        'Settings/CommOrg/Delete your org' => [
            __(':projects projects and :engagements engagements you are running'),
            __('you will no longer be able to access information about the :count engagements you are participating in'),
        ],
    ],

    '5.1 Member pages' => [
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=4074%3A95828
        'Comm org - create your page - 4' => [
            __('Create your :role page'),
            __('Please select the languages that you can translate your page into.'),
            __('Add translation'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1725%3A47435
        'Consultant Community Connector / create profile - 6' => [
            __('Steps for creating your page'),
            __('(current page)'),
            __('You must attend an [orientation session](:url) before you can publish your page.'),
            __('Upload a file'),
            __('You can upload videos, images, audio, or other files.'),
            __('Browse file'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2613%3A68551
        'Consultant Community Connector / create profile - 9' => [
            __('Please select the disability groups that you can connect to.'),
            __('(such as broken limb, gestational diabetes)'),
            __('Which groups can you connect to?'),
            __('People who identify with one or more of the 2SLGBTQIA+ identities'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A16052
        'Consultant Community Connector / preview profile' => [
            __(':name shares **some** of this lived experience.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A16498
        'Consultant/Page/Unpublish modal' => [
            __('Would you like to unpublish your consultant page? (You can republish it later.)'),
            __('When you select this option, your profile page will be hidden from everyone except yourself until you publish it again.'),
            __('Unpublish my page'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1297%3A18839
        'Entity/My projects/Create new project - 22' => [
            __('It is most likely that you will have Consultation Participants who will request English, French, ASL, and LSQ.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1295%3A15858
        'Comm org - create your page - 1' => [
            __('Communities your organization serves'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2560%3A65260
        'Rep orgs' => [
            __('Please select disability groups that your organization specifically represents'),
            __('Which Indigenous groups does your organization specifically represent?'),
            __('Which groups marginalized based on gender or sexual identity does your organization specifically represent?'),
            __('Which age groups does your organization specifically represent?'),
            __('Which ethno-racial identity or identities are the people your organization specifically represents?'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1297%3A19556
        'Comm org page - about - private' => [
            __('Communities we represent'),
            __('Areas where the organization serves'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A17922
        'FCO/Create profile/languages-warning' => [
            __('Please be aware that it is highly likely that people will request English, French, American Sign Language (ASL), and Langue des signes québécoise (LSQ)'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1125%3A17632
        'FCO/Create profile/info' => [
            __('Once you publish your profile, other users on this website can access your page.'),
            __('Step :current of :total'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2233%3A60033
        'FRO/View own profile/success unpublished' => [
            __('You have successfully unpublished your Regulated Organization profile.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=1334%3A24329
        'FRO/View public profile/about - success add to list' => [
            __('You have successfully added :organization to your list.'),
            __('Accessibility and Inclusion'),
            __(':organization Accessibility Principles'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2096%3A54801
        'FRO/View public profile/about - success blocked' => [
            __('You have successfully blocked :organization.'),
        ],
        // https://www.figma.com/file/AXufBnFAVHvGdsxnQMVhNF/The-Accessibility-Exchange-Wireframes?node-id=2472%3A62981
        'FRO/View public profile/blocked page' => [
            __('You’ve blocked :name'),
            __('If you want to visit their page, you can unblock them and return to this page.'),
        ],
    ],
    'Platform admin' => [

        // https://docs.google.com/spreadsheets/d/1KzK9oeyQNGx5zVR_f0aCJ5mBkJ8KNtE-9jRZEp4Fbpk/edit#gid=1670408139
        'Notifications' => [
            __('You have been invited to participate in :projectable’s project, :project. They would like you to join them for their :engagement_type, :engagement'),
            __('You have been invited to participate in :projectable’s project, :project. They would like to interview you for their engagement, :engagement'),
            __('You have been invited to participate in :projectable’s project, :project. They would like you to do their survey for their engagement, :engagement'),
            __('You have been invited to participate in :projectable’s project, :project. They would like you to consult with them for their engagement, :engagement'),
            __('Please review and update your matching information'),
            __('It’s been at least a year since you’ve updated your matching information. Please update this information so that we can be sure to match you with the appropriate projects.'),
            __('Please review and update your communication and consultation preferences'),
            __('Please review and update your public page'),
            __('It’s been at least a year since you’ve updated your public page. Please review and update any changes.'),
            __('Review my page'),
            __('Review my organization’s page'),
            __('New project by :projectable'),
            __(':projectable has created a new project, :project.'),
            __('New engagement by :projectable'),
            __(':projectable has created a new engagement, :engagement. This is a part of :project.'),
            __(':engagement run by :projectable is seeking participants'),
            __(':engagement is now having an open call for participants.'),
            __(':engagement time confirmed'),
            __(':engagement has been confirmed for :date at :time. They are meeting :location.'),
            __(':engagement time changed'),
            __(':engagement has been changed to :date at :time. They are meeting :location.'),
            __(':access_support added for :engagement'),
            __(':projectable has added :access_support for :engagement.'),
            __('You have been added to :project'),
            __('You have been listed as the Accessibility Consultant in :projectable’s project, :project.'),
            __(':project by :projectable seeking Accessibility Consultant'),
            __(':project is looking for an Accessibility Consultant.'),
            __(':project by :projectable seeking Community connector'),
            __(':project is looking for a Community Connector to for their engagement, :engagement.'),
            __(':name has joined your organization'),
            __(':name has accepted your invitation to join your organization.'),
            __('1 new person accepted your invitation for :engagement'),
            __('1 new person signed up for :engagement'),
            __('Your role has been updated to :role'),
            __('You now have administrative privileges for :organization. You can now create and manage projects.'),
            __('You can now view :organization’s projects and engagements.'),
            __('Orientation completed'),
            __('You have completed your orientation session.'),
            __('You can now sign up for projects.'),
            __('You are now able to publish your page and new projects'),
            __('Unfortunately you will not be able to continue using The Accessibility Exchange at this time. You will no longer be able to log in through your account. If you have any questions, please reach out to us at :email or :phone.'),
        ],
    ],
];
