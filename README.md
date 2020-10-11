# q2a-question-list-details
Q2A Question List Details plugin display video (Youtube iframe), graphic image, ans short description of questions on a quest list.

#This plugin overrides q_item_content function to display:

1. A short description of the question content. If the question content has more than 200 bytes (roughly 200 characters) then it will be truncated.
2. Display (the first) iframe video if any
3. Display (the first) graphic image if any
4. If there are both videos and images, only the first video is displayed.
5. May colide with other plugins or theme customizations that also override q_item_content function, or similar activities.
