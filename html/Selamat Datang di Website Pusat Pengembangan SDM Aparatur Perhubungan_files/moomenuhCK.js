if (typeof(MooTools) != 'undefined'){

		var subnav = new Array();

		Element.extend(
		{
			hide: function(timeout)
			{
				this.status = 'hide';
				clearTimeout (this.timeout);
				if (timeout)
				{
					this.timeout = setTimeout (this.anim.bind(this), timeout);
				}else{
					this.anim();
				}
			},

			show: function(timeout)
			{
				this.status = 'show';
				clearTimeout (this.timeout);
				if (timeout)
				{
					this.timeout = setTimeout (this.anim.bind(this), timeout);
				}else{
					this.anim();
				}
			},

			setActive: function () {

				this.className+=' sfhover';

			},

			setDeactive: function () {

				this.className=this.className.replace(new RegExp(" sfhover\\b"), "");

			},

			anim: function() {
				if ((this.status == 'hide' && this.style.left != 'auto') || (this.status == 'show' && this.style.left == 'auto' && !this.hidding)) return;
				this.setStyle('overflow', 'hidden');
				if (this.status == 'show') {
					this.hidding = 0;
					this.hideAll();

				} else {

				}

				if (this.status == 'hide')
				{
					this.hidding = 1;

					this.myFx2.stop();

					if (this.parent._id) this.myFx2.start(this.offsetWidth,0);
					else this.myFx2.start(this.offsetHeight,0);
				} else {
					this.setStyle('left', 'auto');

					this.myFx2.stop();

					if (this.parent._id) this.myFx2.start(0,this.mw);
					else this.myFx2.start(0,this.mh);
				}
			},

			init: function(duree,matransition,monease) {

				this.mw = this.clientWidth;
				this.mh = this.clientHeight;


				if (this.parent._id)
				{
                                        var myTransition = new Fx.Transition(Fx.Transitions[matransition][monease]);
					this.myFx2 = new Fx.Style(this, 'width', {duration:duree,transition: myTransition});

                                        this.myFx2.set(0);
				}else{
                                        var myTransition = new Fx.Transition(Fx.Transitions[matransition][monease]);
					this.myFx2 = new Fx.Style(this, 'height', {duration:duree,transition: myTransition});

					this.myFx2.set(0);
				}
				this.setStyle('left', '-999em');
				animComp = function(){
					if (this.status == 'hide')
					{
						this.setStyle('left', '-999em');
						this.hidding = 0;
					}
					this.setStyle('overflow', '');
				}
				this.myFx2.addEvent ('onComplete', animComp.bind(this));
			},

			hideAll: function() {
				for(var i=0;i<subnav.length; i++) {
					if (!this.isChild(subnav[i]))
					{
						subnav[i].hide(0);
					}
				}
			},

			isChild: function(_obj) {
				obj = this;
				while (obj.parent)
				{
					if (obj._id == _obj._id)
					{
						//alert(_obj._id);
						return true;
					}
					obj = obj.parent;
				}
				return false;
			}


		});

                var AppliqueStyles = new Class({
                        Implements: Options,
                        options: {    //options par défaut si aucune option utilisateur n'est renseignée
                                    mooTransition : 'Bounce',
                                    mooEase : 'easeOut',
                                    mooDuree : 500,
                                    hauteur : '38px',
                                    largeur : '198px'
                        },
			initialize: function(element,options)
			{
                                this.setOptions(options); //enregistre les options utilisateur

                                $$('#moomenuCK').setStyle('height',''+this.options.hauteur+'');
                                $$('#moomenuCK li ul','#moomenuCK li ul li').setStyle('width',''+this.options.largeur+'');
                                $$('#moomenuCK li ul ul').setStyle('margin','-'+this.options.hauteur+' 0 0 '+this.options.largeur+'');


                         }
                });
		var DropdownMenu = new Class({
                        Implements: Options,
                        options: {    //options par défaut si aucune option utilisateur n'est renseignée
                                    mooTransition : 'Bounce',
                                    mooEase : 'easeOut',
                                    mooDuree : 500,
                                    hauteur : '38px',
                                    largeur : '198px'
                        },
			initialize: function(element,options)
			{
                                this.setOptions(options); //enregistre les options utilisateur

                                var maduree = this.options.mooDuree;
                                var matransition = this.options.mooTransition;
                                var monease = this.options.mooEase;
                                var mahauteur = this.options.hauteur;
                                var malargeur = this.options.largeur;

				$A($(element).childNodes).each(function(el)
				{
					if(el.nodeName.toLowerCase() == 'li')
					{
						
						$A($(el).childNodes).each(function(el2)
						{
							if(el2.nodeName.toLowerCase() == 'ul')
							{
								$(el2)._id = subnav.length+1;
								$(el2).parent = $(element);
								subnav.push ($(el2));
								el2.init(maduree,matransition,monease);
								el.addEvent('mouseover', function()
								{
									el.setActive();
									el2.show(0);
									return false;
								});

								el.addEvent('mouseout', function()
								{
									el.setDeactive();
									el2.hide(20);
								});
								new DropdownMenu(el2,{mooTransition:matransition,mooDuree:maduree,mooEase:monease,hauteur:mahauteur,largeur:malargeur});
								el.hasSub = 1;
							}
						});
						if (!el.hasSub)
						{
							el.addEvent('mouseover', function()
							{
								el.setActive();
								return false;
							});

							el.addEvent('mouseout', function()
							{
								el.setDeactive();
							});
						}
					}
				});
				return this;
			}
		});
		DropdownMenu.implement(new Options); //ajoute les options utilisateur à la class
                AppliqueStyles.implement(new Options);

		/*Window.onDomReady(function() {new DropdownMenu($E('#moomenuCK'),{
                  //mooTransition : 'Quad',
			               //mooTransition : 'Cubic',
			               //mooTransition : 'Quart',
			               //mooTransition : 'Quint',
			               //mooTransition : 'Pow',
			               //mooTransition : 'Expo',
			               //mooTransition : 'Circ',
			               mooTransition : 'Sine',
			               //mooTransition : 'Back',
			               //mooTransition : 'Bounce',
			               //mooTransition : 'Elastic',

			               mooEase : 'easeIn',
                                       //mooEase : 'easeOut',
                                       //mooEase : 'easeInOut',
                                       
                                       mooDuree : 800
                                       })
                                       });*/

	}else {

		sfHover = function() {
		var sfEls = document.getElementById("moomenuCK").getElementsByTagName("li");
		for (var i=0; i<sfEls.length; ++i) {
			sfEls[i].onmouseover=function() {
				this.className+="sfhover";
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp("sfhover\\b"), "");
			}
		}
	}
	if (window.attachEvent) window.attachEvent("onload", sfHover);
}
