Hey Mr, Mazen,

It was a nice challenge and I was able to solve the tasks required in it.

So, please take a look at the zip file in the attachments.

Here are a couple of notes to take into consideration while looking into the code:

- I have created a plugin instead of using **functions.php** of the Twenty Twenty-One theme to create the custom post type (writers), The plugin folder name is "**writer-cpt**" it consists of writer-cpt.php and folder "includes" contains "**core.php**".

- Regarding the custom fields: I have created the custom fields using the built-in WordPress custom fields besides ACF, in case of (ACF is active you can use it too) (Most of the work for the custom fields exists in “content-writer.php” in “template-parts” Folder.

- The Writers grid (Section below the writer table) I have used Flexbox as required the CSS for Styling exist in style.css in the root under the comment "My Styling Mohammed Rezq".

- Regarding the functionality for Writers grid you can check the code in “writers.php” in “template-parts”.

- I have created "**single-writer.php**" to display all the posts about the writers.

- I have used Twenty Twenty-one -official WordPress theme- (It wasn’t the best choice, but fortunately it did the trick).

Let me know if there’s anything else I can do.
