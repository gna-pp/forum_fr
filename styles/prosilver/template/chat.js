/**
* styles/prosilver/template/chat.js
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
		this.messages.scrollTop = this.messages.scrollHeight;
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
		var dateElement = document.createElement('li');
			dateElement.id = id;
			dateElement.className = 'row chat_date bg3';
			dateElement.textContent = dateElement.innerText = date;
		this.messages.appendChild(dateElement);

		this.scroll();
	},

	addMessage: function(id, info)
	{
		var messageElement = document.createElement('li');
			messageElement.id = id;
			messageElement.className = 'row new';
			messageElement.addEventListener('mouseover', this.normalizeColor, false);

			var divElement = document.createElement('div');
				divElement.className = 'chat_info';

				var author = info.getElementsByTagName('author')[0];
				var authorElement = document.createElement('div');
					authorElement.className = 'chat_author';
					authorElement.innerHTML = (author.textContent) ? author.textContent : author.innerText;
				divElement.appendChild(authorElement);

				var time = info.getElementsByTagName('time')[0];
				var timeElement = document.createElement('div');
					timeElement.className = 'chat_time';
					timeElement.innerHTML = (time.textContent) ? time.textContent : time.innerText;
				divElement.appendChild(timeElement);

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

					divElement.appendChild(actionsElement);
				}

			messageElement.appendChild(divElement);

			var text = info.getElementsByTagName('text')[0];
			var textElement = document.createElement('div');
				textElement.className = 'chat_text';
				textElement.innerHTML = (text.textContent) ? text.textContent : text.innerText;
			messageElement.appendChild(textElement);

			var clearElement = document.createElement('div');
				clearElement.className = 'chat_clear';
			messageElement.appendChild(clearElement);
		this.messages.appendChild(messageElement);

		this.scroll();
	},

	deleteMessage: function(messageID)
	{
		//this.messages.removeChild(document.getElementByID(messageID));
		document.getElementById(messageID).innerHTML = '';
	},

	normalizeColor: function()
	{
		// this is an li.row.new
		this.className = 'row';
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