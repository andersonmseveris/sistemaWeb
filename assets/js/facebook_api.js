APIFacebook = function(app_id)
{
	var self = this;

	self.app_id = app_id;
	self.user_logged = false;

	FB.init({
	  appId  : self.app_id,
	  status : false, // check login status
	  cookie : false, // enable cookies to allow the server to access the session
	  xfbml  : true  // parse XFBML
	});

	APIFacebook.prototype.user_login = function(_callback,_scope) {
		FB.login(function(response) {
			if (response.authResponse) {
				_callback(response.authResponse);
			}
			else
			{
				_callback(false);
			}
		}, {scope:_scope});
	};

	APIFacebook.prototype.user_session = function(_callback) {
		FB.getLoginStatus(function(response){
			var retorno = false;
			self.user_logged = false;
			if(response.status === 'connected') {
				retorno = response.authResponse;
				self.user_logged = retorno;
			}
			_callback(retorno);
		});
	};

	APIFacebook.prototype.auth_response = function(){

	};

	APIFacebook.prototype.user_logout = function(_callback) {
		FB.logout(function(response) {
			_callback(response);
		});
	};

	APIFacebook.prototype.post = function(_name,_link,_picture,_caption,_description,_msg,_callback) {
		if(arguments.length == 7)
		{
			FB.ui(
			{
				method: 'feed',
				name: _name,
				link: _link,
				picture: _picture,
				caption: _caption,
				description: _description,
				message: _msg
			},
			function(response) {
				if (response && response.post_id) {
					_callback(response);
				} else {
					_callback(false);
				}
			});
		}
		else
		{
			alert("post() - invalid arguments length.");
		}
	};

	APIFacebook.prototype.query = function(_query, _callback) {
		var fql = FB.Data.query(_query);

		fql.wait(function(rows) {
			_callback(rows);
		});
	}

	APIFacebook.prototype.add_facbook_listener = function(_type, _callback) {
		/*
		TYPES:
		auth.login - fired when the user logs in
		auth.logout - fired when the user logs out
		auth.prompt - fired when user is prompted to log in or opt in to Platform after clicking a Like button
		auth.sessionChange - fired when the session changes
		auth.statusChange - fired when the status changes
		xfbml.render - fired when a call to FB.XFBML.parse() completes
		edge.create - fired when the user likes something (fb:like)
		edge.remove - fired when the user unlikes something (fb:like)
		comment.create - fired when the user adds a comment (fb:comments)
		comment.remove - fired when the user removes a comment (fb:comments)
		fb.log - fired on log message
		*/

		FB.Event.subscribe(_type, function(response) {
		  _callback(response);
		});
	}

	APIFacebook.prototype.remove_facebook_listener = function(_type, _callback) {
		FB.Event.unsubscribe(_type, function(response) {
		  _callback(response);
		});
	}

	APIFacebook.prototype.get_user_data = function(_user_id, _callback) {
		FB.api('/'+ _user_id, function(response) {
			if (!response || response.error.message)
			{
				alert(response.error.message);
			}
			else
			{
				_callback(response);
			}
		});
	}

	APIFacebook.prototype.call_api = function() {
		/*
		PARAMS

		param1 - The method to call or the post id to be updated/deleted (string).
		param2 - the arguments to complete the api call (json), or the action for the post (string) or the callback functions (function).
		param3 - the post arguments, in post cases (json), or the callback function (function)
		param4 - callback function (function)
		*/
		if(this.user_session())
		{
			var _args = arguments;
			var _method_or_post = _args[0];

			switch(_args.length)
			{
				case 2:
					var _callback = _args[1];
					FB.api(_method_or_post, function(response) {
					  if (!response || response.error) {
					alert(response.error.message);
					  } else {
						_callback(response);
					  }
					});

					break;
				case 3:
					var _action = _args[1];
					var _callback = _args[2];

					FB.api(_method_or_post, _action, function(response) {
					  if (!response || response.error) {
						alert(response.error.message);
					  } else {
						_callback(response);
					  }
					});

					break;
				case 4:
					var _type = _args[1];
					var _post_args = _args[2];
					var _callback = _args[3];

					FB.api(_method_or_post, _type,  _post_args , function(response) {
					  if (!response || response.error) {
						alert(response.error.message);
					  } else {
						_callback(response);
					  }
					});

					break;
				default:
					alert("call_api() - invalid arguments length.");
					break;
			}
		}
		else
		{
			this.user_login(function(data){  });
		}
	}
}