/**
* styles/subsilver2/template/chat.js
*
* @package Chat
* @version 0.2
* @copyright (c) 2008 phpBB3.PL Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

chat_template = {
	messages:      null,
	postingForm:   null,
	postingButton: null,

	scroll: function()
	{
		overflow = document.getElementById('chat_overflow');
		overflow.scrollTop = overflow.scrollHeight;
	},

	construct: function()
	{
		this.messages      = document.getElementById('chat_messages');
		this.postingForm   = document.getElementById('chat_posting');
		this.postingButton = document.getElementById('chat_posting_submit');

		this.scroll();
	},

	addDate: function(id, date)
	{
		var dateElement = document.createElement('th');
			dateElement.id = id;
			dateElement.colSpan = "2";
			dateElement.width = "100%";
			dateElement.innerHTML = date;
		this.messages.appendChild(dateElement);

		this.scroll();
	},

	addMessage: function(id, info)
	{
		var messageElement = document.createElement('tr');
		messageElement.id = id;
		messageElement.className = 'new';
		messageElement.addEventListener('mouseover', this.normalizeColor, false);

		var tdElement = document.createElement('td');
		tdElement.className = 'row1 chat_info';

		var author = info.getElementsByTagName('author')[0];
		var authorElement = document.createElement('div');
		authorElement.className = 'chat_author';
		authorElement.innerHTML = (author.textContent) ? author.textContent : author.innerText;
		tdElement.appendChild(authorElement);

		var time = info.getElementsByTagName('time')[0];
		var timeElement = document.createElement('div');
		timeElement.className = 'chat_time';
		timeElement.innerHTML = (time.textContent) ? time.textContent : time.innerText;
		tdElement.appendChild(timeElement);

		if (info.hasAttributeNS('http://phpbb3.pl/xmlns/chat/actions/', 'delete'))
		{
			var actionsElement = document.createElement('div');
			actionsElement.className = 'chat_actions';

			var deleteMsg = info.getAttributeNS('http://phpbb3.pl/xmlns/chat/actions/', 'delete');
			var deleteMsgElement = document.createElement('a');
			deleteMsgElement.setAttribute('href', deleteMsg);
			deleteMsgElement.innerHTML = 'x';
			deleteMsgElement.onclick = chat.actionEngine.runAction;
			actionsElement.appendChild(deleteMsgElement);

			tdElement.appendChild(actionsElement);
		}

		messageElement.appendChild(tdElement);

		var text = info.getElementsByTagName('text')[0];
		var textElement = document.createElement('td');
		textElement.className = 'row1 chat_text';
		textElement.innerHTML = (text.textContent) ? text.textContent : text.innerText;
		messageElement.appendChild(textElement);

		this.messages.appendChild(messageElement);

		this.scroll();
	},

	deleteMessage: function(messageID)
	{
		this.messages.removeChild(document.getElementById(messageID));
		//document.getElementById(messageID).innerHTML = '';
	},

	normalizeColor: function()
	{
		this.className = '';
	},

	onMessageSent: function()
	{
		chat.template.postingForm.message.readOnly = true;
		chat.template.postingButton.disabled = true;
	},

	onMessagePosted: function(response)
	{
		chat.template.postingForm.message.readOnly = false;
		chat.template.postingButton.disabled = false;
	},

	onMessagePostedSuccessfully: function(response)
	{
		chat.template.postingForm.message.value = '';
	}
}