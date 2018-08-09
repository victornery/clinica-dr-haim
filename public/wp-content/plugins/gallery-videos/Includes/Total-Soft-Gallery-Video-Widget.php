<?php
	class Total_Soft_Gallery_Video extends WP_Widget
	{
		function __construct()
		{
			$params=array('name'=>'Total Soft Gallery Video','description'=>'This is the widget of Total Soft Gallery Video plugin');
			parent::__construct('Total_Soft_Gallery_Video','',$params);
		}
		function form($instance)
		{
			$defaults = array('Total_Soft_Gallery_Video'=>'');
			$instance = wp_parse_args((array)$instance, $defaults);

			$Gallery_Video = $instance['Gallery_Video'];
			?>
			<div>
				<p>
					Gallery Video Title:
					<select name="<?php echo $this->get_field_name('Gallery_Video'); ?>" class="widefat">
						<?php
							global $wpdb;

							$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";
							$Total_Soft_Gallery_Video=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d", 0));
							
							foreach ($Total_Soft_Gallery_Video as $Total_Soft_Gallery_Video1)
							{
								?> <option value="<?php echo $Total_Soft_Gallery_Video1->id; ?>"> <?php echo $Total_Soft_Gallery_Video1->TotalSoftGallery_Video_Gallery_Title; ?> </option> <?php
							}
						?>
					</select>
				</p>
			</div>
			<?php
		}
		function widget($args,$instance)
		{
			extract($args);
			$Total_Soft_Gallery_Video = empty($instance['Gallery_Video']) ? '' : $instance['Gallery_Video'];

			require_once('Total-Soft-Gallery-Video-Install.php');

			global $wpdb;
			$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";
			$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";
			$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
			$table_name4_1 = $wpdb->prefix . "totalsoft_galleryv_dbt_1";
			$table_name4_2 = $wpdb->prefix . "totalsoft_galleryv_dbt_2";

			$Total_Soft_GalleryV_Man=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $Total_Soft_Gallery_Video));
			
			$Total_Soft_GalleryV_Videos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE GalleryV_ID = %s order by id", $Total_Soft_Gallery_Video));
			$Total_Soft_GalleryV_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftGalleryV_SetName = %s", $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_Option));

			$TotalSoftGallery_Video_Opt1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4_1 WHERE TotalSoftGalleryV_SetID = %s", $Total_Soft_GalleryV_Type[0]->id));
			$TotalSoftGallery_Video_Opt2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4_2 WHERE TotalSoftGalleryV_SetID = %s", $Total_Soft_GalleryV_Type[0]->id));

			echo $before_widget;
			?>
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
				<link href="https://fonts.googleapis.com/css?family=ABeeZee|Abel|Abhaya+Libre|Abril+Fatface|Aclonica|Acme|Actor|Adamina|Advent+Pro|Aguafina+Script|Akronim|Aladin|Aldrich|Alef|Alegreya|Alegreya+SC|Alegreya+Sans|Alegreya+Sans+SC|Alex+Brush|Alfa+Slab+One|Alice|Alike|Alike+Angular|Allan|Allerta|Allerta+Stencil|Allura|Almendra|Almendra+Display|Almendra+SC|Amarante|Amaranth|Amatic+SC|Amethysta|Amiko|Amiri|Amita|Anaheim|Andada|Andika|Angkor|Annie+Use+Your+Telescope|Anonymous+Pro|Antic|Antic+Didone|Antic+Slab|Anton|Arapey|Arbutus|Arbutus+Slab|Architects+Daughter|Archivo|Archivo+Black|Archivo+Narrow|Aref+Ruqaa|Arima+Madurai|Arimo|Arizonia|Armata|Arsenal|Artifika|Arvo|Arya|Asap|Asap+Condensed|Asar|Asset|Assistant|Astloch|Asul|Athiti|Atma|Atomic+Age|Aubrey|Audiowide|Autour+One|Average|Average+Sans|Averia+Gruesa+Libre|Averia+Libre|Averia+Sans+Libre|Averia+Serif+Libre|Bad+Script|Bahiana|Baloo|Baloo+Bhai|Baloo+Bhaijaan|Baloo+Bhaina|Baloo+Chettan|Baloo+Da|Baloo+Paaji|Baloo+Tamma|Baloo+Tammudu|Baloo+Thambi|Balthazar|Bangers|Barlow|Barlow+Condensed|Barlow+Semi+Condensed|Barrio|Basic|Battambang|Baumans|Bayon|Belgrano|Bellefair|Belleza|BenchNine|Bentham|Berkshire+Swash|Bevan|Bigelow+Rules|Bigshot+One|Bilbo|Bilbo+Swash+Caps|BioRhyme|BioRhyme+Expanded|Biryani|Bitter|Black+And+White+Picture|Black+Han+Sans|Black+Ops+One|Bokor|Bonbon|Boogaloo|Bowlby+One|Bowlby+One+SC|Brawler|Bree+Serif|Bubblegum+Sans|Bubbler+One|Buda:300|Buenard|Bungee|Bungee+Hairline|Bungee+Inline|Bungee+Outline|Bungee+Shade|Butcherman|Butterfly+Kids|Cabin|Cabin+Condensed|Cabin+Sketch|Caesar+Dressing|Cagliostro|Cairo|Calligraffitti|Cambay|Cambo|Candal|Cantarell|Cantata+One|Cantora+One|Capriola|Cardo|Carme|Carrois+Gothic|Carrois+Gothic+SC|Carter+One|Catamaran|Caudex|Caveat|Caveat+Brush|Cedarville+Cursive|Ceviche+One|Changa|Changa+One|Chango|Chathura|Chau+Philomene+One|Chela+One|Chelsea+Market|Chenla|Cherry+Cream+Soda|Cherry+Swash|Chewy|Chicle|Chivo|Chonburi|Cinzel|Cinzel+Decorative|Clicker+Script|Coda|Coda+Caption:800|Codystar|Coiny|Combo|Comfortaa|Coming+Soon|Concert+One|Condiment|Content|Contrail+One|Convergence|Cookie|Copse|Corben|Cormorant|Cormorant+Garamond|Cormorant+Infant|Cormorant+SC|Cormorant+Unicase|Cormorant+Upright|Courgette|Cousine|Coustard|Covered+By+Your+Grace|Crafty+Girls|Creepster|Crete+Round|Crimson+Text|Croissant+One|Crushed|Cuprum|Cute+Font|Cutive|Cutive+Mono|Damion|Dancing+Script|Dangrek|David+Libre|Dawning+of+a+New+Day|Days+One|Delius|Delius+Swash+Caps|Delius+Unicase|Della+Respira|Denk+One|Devonshire|Dhurjati|Didact+Gothic|Diplomata|Diplomata+SC|Do+Hyeon|Dokdo|Domine|Donegal+One|Doppio+One|Dorsa|Dosis|Dr+Sugiyama|Duru+Sans|Dynalight|EB+Garamond|Eagle+Lake|East+Sea+Dokdo|Eater|Economica|Eczar|El+Messiri|Electrolize|Elsie|Elsie+Swash+Caps|Emblema+One|Emilys+Candy|Encode+Sans|Encode+Sans+Condensed|Encode+Sans+Expanded|Encode+Sans+Semi+Condensed|Encode+Sans+Semi+Expanded|Engagement|Englebert|Enriqueta|Erica+One|Esteban|Euphoria+Script|Ewert|Exo|Expletus+Sans|Fanwood+Text|Farsan|Fascinate|Fascinate+Inline|Faster+One|Fasthand|Fauna+One|Faustina|Federant|Federo|Felipa|Fenix|Finger+Paint|Fira+Mono|Fira+Sans|Fira+Sans+Condensed|Fira+Sans+Extra+Condensed|Fjalla+One|Fjord+One|Flamenco|Flavors|Fondamento|Fontdiner+Swanky|Forum|Francois+One|Frank+Ruhl+Libre|Freckle+Face|Fredericka+the+Great|Fredoka+One|Freehand|Fresca|Frijole|Fruktur|Fugaz+One|GFS+Didot|GFS+Neohellenic|Gabriela|Gaegu|Gafata|Galada|Galdeano|Galindo|Gamja+Flower|Gentium+Basic|Gentium+Book+Basic|Geo|Geostar|Geostar+Fill|Germania+One|Gidugu|Gilda+Display|Give+You+Glory|Glass+Antiqua|Glegoo|Gloria+Hallelujah|Goblin+One|Gochi+Hand|Gorditas|Gothic+A1|Graduate|Grand+Hotel|Gravitas+One|Great+Vibes|Griffy|Gruppo|Gudea|Gugi|Gurajada|Habibi|Halant|Hammersmith+One|Hanalei|Hanalei+Fill|Handlee|Hanuman|Happy+Monkey|Harmattan|Headland+One|Heebo|Henny+Penny|Herr+Von+Muellerhoff|Hi+Melody|Hind|Holtwood+One+SC|Homemade+Apple|Homenaje|IBM+Plex+Mono|IBM+Plex+Sans|IBM+Plex+Sans+Condensed|IBM+Plex+Serif|IM+Fell+DW+Pica|IM+Fell+DW+Pica+SC|IM+Fell+Double+Pica|IM+Fell+Double+Pica+SC|IM+Fell+English|IM+Fell+English+SC|IM+Fell+French+Canon|IM+Fell+French+Canon+SC|IM+Fell+Great+Primer|IM+Fell+Great+Primer+SC|Iceberg|Iceland|Imprima|Inconsolata|Inder|Indie+Flower|Inika|Irish+Grover|Istok+Web|Italiana|Italianno|Itim|Jacques+Francois|Jacques+Francois+Shadow|Jaldi|Jim+Nightshade|Jockey+One|Jolly+Lodger|Jomhuria|Josefin+Sans|Josefin+Slab|Joti+One|Jua|Judson|Julee|Julius+Sans+One|Junge|Jura|Just+Another+Hand|Just+Me+Again+Down+Here|Kadwa|Kalam|Kameron|Kanit|Kantumruy|Karla|Karma|Katibeh|Kaushan+Script|Kavivanar|Kavoon|Kdam+Thmor|Keania+One|Kelly+Slab|Kenia|Khand|Khmer|Khula|Kirang+Haerang|Kite+One|Knewave|Kotta+One|Koulen|Kranky|Kreon|Kristi|Krona+One|Kumar+One|Kumar+One+Outline|Kurale|La+Belle+Aurore|Laila|Lakki+Reddy|Lalezar|Lancelot|Lateef|Lato|League+Script|Leckerli+One|Ledger|Lekton|Lemon|Lemonada|Libre+Baskerville|Libre+Franklin|Life+Savers|Lilita+One|Lily+Script+One|Limelight|Linden+Hill|Lobster|Lobster+Two|Londrina+Outline|Londrina+Shadow|Londrina+Sketch|Londrina+Solid|Lora|Love+Ya+Like+A+Sister|Loved+by+the+King|Lovers+Quarrel|Luckiest+Guy|Lusitana|Lustria|Macondo|Macondo+Swash+Caps|Mada|Magra|Maiden+Orange|Maitree|Mako|Mallanna|Mandali|Manuale|Marcellus|Marcellus+SC|Marck+Script|Margarine|Marko+One|Marmelad|Martel|Martel+Sans|Marvel|Mate|Mate+SC|Maven+Pro|McLaren|Meddon|MedievalSharp|Medula+One|Meera+Inimai|Megrim|Meie+Script|Merienda|Merienda+One|Merriweather|Merriweather+Sans|Metal|Metal+Mania|Metamorphous|Metrophobic|Michroma|Milonga|Miltonian|Miltonian+Tattoo|Mina|Miniver|Miriam+Libre|Mirza|Miss+Fajardose|Mitr|Modak|Modern+Antiqua|Mogra|Molengo|Molle:400i|Monda|Monofett|Monoton|Monsieur+La+Doulaise|Montaga|Montez|Montserrat|Montserrat+Alternates|Montserrat+Subrayada|Moul|Moulpali|Mountains+of+Christmas|Mouse+Memoirs|Mr+Bedfort|Mr+Dafoe|Mr+De+Haviland|Mrs+Saint+Delafield|Mrs+Sheppards|Mukta|Muli|Mystery+Quest|NTR|Nanum+Brush+Script|Nanum+Gothic|Nanum+Gothic+Coding|Nanum+Myeongjo|Nanum+Pen+Script|Neucha|Neuton|New+Rocker|News+Cycle|Niconne|Nixie+One|Nobile|Nokora|Norican|Nosifer|Nothing+You+Could+Do|Noticia+Text|Noto+Sans|Noto+Serif|Nova+Cut|Nova+Flat|Nova+Mono|Nova+Oval|Nova+Round|Nova+Script|Nova+Slim|Nova+Square|Numans|Nunito|Nunito+Sans|Odor+Mean+Chey|Offside|Old+Standard+TT|Oldenburg|Oleo+Script|Oleo+Script+Swash+Caps|Open+Sans|Open+Sans+Condensed:300|Oranienbaum|Orbitron|Oregano|Orienta|Original+Surfer|Oswald|Over+the+Rainbow|Overlock|Overlock+SC|Overpass|Overpass+Mono|Ovo|Oxygen|Oxygen+Mono|PT+Mono|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|PT+Serif+Caption|Pacifico|Padauk|Palanquin|Palanquin+Dark|Pangolin|Paprika|Parisienne|Passero+One|Passion+One|Pathway+Gothic+One|Patrick+Hand|Patrick+Hand+SC|Pattaya|Patua+One|Pavanam|Paytone+One|Peddana|Peralta|Permanent+Marker|Petit+Formal+Script|Petrona|Philosopher|Piedra|Pinyon+Script|Pirata+One|Plaster|Play|Playball|Playfair+Display|Playfair+Display+SC|Podkova|Poiret+One|Poller+One|Poly|Pompiere|Pontano+Sans|Poor+Story|Poppins|Port+Lligat+Sans|Port+Lligat+Slab|Pragati+Narrow|Prata|Preahvihear|Pridi|Princess+Sofia|Prociono|Prompt|Prosto+One|Proza+Libre|Puritan|Purple+Purse|Quando|Quantico|Quattrocento|Quattrocento+Sans|Questrial|Quicksand|Quintessential|Qwigley|Racing+Sans+One|Radley|Rajdhani|Rakkas|Raleway|Raleway+Dots|Ramabhadra|Ramaraja|Rambla|Rammetto+One|Ranchers|Rancho|Ranga|Rasa|Rationale|Ravi+Prakash|Redressed|Reem+Kufi|Reenie+Beanie|Revalia|Rhodium+Libre|Ribeye|Ribeye+Marrow|Righteous|Risque|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Rochester|Rock+Salt|Rokkitt|Romanesco|Ropa+Sans|Rosario|Rosarivo|Rouge+Script|Rozha+One|Rubik|Rubik+Mono+One|Ruda|Rufina|Ruge+Boogie|Ruluko|Rum+Raisin|Ruslan+Display|Russo+One|Ruthie|Rye|Sacramento|Sahitya|Sail|Saira|Saira+Condensed|Saira+Extra+Condensed|Saira+Semi+Condensed|Salsa|Sanchez|Sancreek|Sansita|Sarala|Sarina|Sarpanch|Satisfy|Scada|Scheherazade|Schoolbell|Scope+One|Seaweed+Script|Secular+One|Sedgwick+Ave|Sedgwick+Ave+Display|Sevillana|Seymour+One|Shadows+Into+Light|Shadows+Into+Light+Two|Shanti|Share|Share+Tech|Share+Tech+Mono|Shojumaru|Short+Stack|Shrikhand|Siemreap|Sigmar+One|Signika|Signika+Negative|Simonetta|Sintony|Sirin+Stencil|Six+Caps|Skranji|Slackey|Smokum|Smythe|Sniglet|Snippet|Snowburst+One|Sofadi+One|Sofia|Song+Myung|Sonsie+One|Sorts+Mill+Goudy|Source+Code+Pro|Source+Sans+Pro|Source+Serif+Pro|Space+Mono|Special+Elite|Spectral|Spectral+SC|Spicy+Rice|Spinnaker|Spirax|Squada+One|Sree+Krushnadevaraya|Sriracha|Stalemate|Stalinist+One|Stardos+Stencil|Stint+Ultra+Condensed|Stint+Ultra+Expanded|Stoke|Strait|Stylish|Sue+Ellen+Francisco|Suez+One|Sumana|Sunflower:300|Sunshiney|Supermercado+One|Sura|Suranna|Suravaram|Suwannaphum|Swanky+and+Moo+Moo|Syncopate|Tajawal|Tangerine|Taprom|Tauri|Taviraj|Teko|Telex|Tenali+Ramakrishna|Tenor+Sans|Text+Me+One|The+Girl+Next+Door|Tienne|Tillana|Timmana|Tinos|Titan+One|Titillium+Web|Trade+Winds|Trirong|Trocchi|Trochut|Trykker|Tulpen+One|Ubuntu|Ubuntu+Condensed|Ubuntu+Mono|Ultra|Uncial+Antiqua|Underdog|Unica+One|UnifrakturCook:700|UnifrakturMaguntia|Unkempt|Unlock|Unna|VT323|Vampiro+One|Varela|Varela+Round|Vast+Shadow|Vesper+Libre|Vibur|Vidaloka|Viga|Voces|Volkhov|Vollkorn|Vollkorn+SC|Voltaire|Waiting+for+the+Sunrise|Wallpoet|Walter+Turncoat|Warnes|Wellfleet|Wendy+One|Wire+One|Work+Sans|Yanone+Kaffeesatz|Yantramanav|Yatra+One|Yellowtail|Yeon+Sung|Yeseva+One|Yesteryear|Yrsa|Zeyada|Zilla+Slab|Zilla+Slab+Highlight" rel="stylesheet">
			<?php
			if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ $TotalSoft_GV_1_16='inline'; }else{ $TotalSoft_GV_1_16='none'; }
			if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='1'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-angle-double-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-angle-double-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='2'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-angle-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-angle-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='3'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-arrow-circle-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-arrow-circle-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='4'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-arrow-circle-o-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-arrow-circle-o-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='5'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-arrow-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-arrow-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='6'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-caret-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-caret-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='7'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-caret-square-o-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-caret-square-o-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='8'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-chevron-circle-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-chevron-circle-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='9'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-chevron-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-chevron-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='10'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-hand-o-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-hand-o-right'; }
			else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36=='11'){ $TotalSoft_GV_1_36_Left='totalsoft totalsoft-long-arrow-left'; $TotalSoft_GV_1_36_Right='totalsoft totalsoft-long-arrow-right'; }
			if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='1'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-angle-double-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-angle-double-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='2'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-angle-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-angle-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='3'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-arrow-circle-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-arrow-circle-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='4'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-arrow-circle-o-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-arrow-circle-o-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='5'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-arrow-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-arrow-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='6'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-caret-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-caret-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='7'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-caret-square-o-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-caret-square-o-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='8'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-chevron-circle-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-chevron-circle-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='9'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-chevron-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-chevron-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='10'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-hand-o-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-hand-o-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03=='11'){ $TotalSoft_GV_2_03_Left='totalsoft totalsoft-long-arrow-left'; $TotalSoft_GV_2_03_Right='totalsoft totalsoft-long-arrow-right'; }
			if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06=='1'){ $TotalSoft_GV_2_06_Del='totalsoft totalsoft-times';}
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06=='2'){ $TotalSoft_GV_2_06_Del='totalsoft totalsoft-times-circle';}
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06=='3'){ $TotalSoft_GV_2_06_Del='totalsoft totalsoft-times-circle-o';}
			if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 1){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-angle-double-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-angle-double-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 2){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-angle-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-angle-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 3){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-arrow-circle-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-arrow-circle-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 4){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-arrow-circle-o-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-arrow-circle-o-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 5){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-arrow-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-arrow-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 6){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-caret-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-caret-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 7){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-caret-square-o-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-caret-square-o-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 8){ $TotalSoft_PS_Left_Icon='totalsoft-chevron-circle-left'; $TotalSoft_PS_Right_Icon='totalsoft-chevron-circle-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 9){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-chevron-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-chevron-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 10){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-hand-o-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-hand-o-right'; }
			else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03 == 11){ $TotalSoft_PS_Left_Icon='totalsoft totalsoft-long-arrow-left'; $TotalSoft_PS_Right_Icon='totalsoft totalsoft-long-arrow-right';}
			if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_CS_Video_ArrShow=='true'){ $TotalSoft_CS_Video_ArrShow = 'inline-block'; }else{ $TotalSoft_CS_Video_ArrShow = 'none'; }
			for($i = 0; $i < count($Total_Soft_GalleryV_Videos); $i++)
			{
				if(strpos($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL,"youtube"))
				{
					$rest = substr($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL, 0, -13);
					$link = $rest.'maxresdefault.jpg';
					if(@fopen("$link",'r')) { $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL = $link; }
				}
			}
			if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Grid Video Gallery'){ ?>
				<style type="text/css">
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> ul { list-style: none; margin: 0; padding: 0 !important; }
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figure { margin: 0; }
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figure img { display: block; width: 100%; margin: 0 !important; }
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3, .grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figcaption p { margin: 0; margin-top: 5px; }
					/* Grid style */
					.grid<?php echo $Total_Soft_Gallery_Video; ?>-wrap { max-width: 69em; margin: 0 auto; padding: 0 1em 1.875em; }
					.grid<?php echo $Total_Soft_Gallery_Video; ?>
					{
						margin: 0 auto;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
					.grid<?php echo $Total_Soft_Gallery_Video; ?> li 
					{
						float: left;
						cursor: pointer;
						left:0px;
						list-style-type: none !important;
						padding:0px !important;
						margin:0px !important;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}					
					.grid<?php echo $Total_Soft_Gallery_Video; ?> figure { -webkit-transition: opacity 0.2s; transition: opacity 0.2s; }
					.grid<?php echo $Total_Soft_Gallery_Video; ?> figcaption { padding: 5px 10px; }
					/* Slideshow style */
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position: fixed;
						background: rgba(0,0,0,0.6);
						width: 100%;
						height: 100%;
						top: 0;
						left: 0;
						z-index: 999999 !important;
						opacity: 0;
						visibility: hidden;
						overflow: hidden;
						-webkit-perspective: 1000px;
						-moz-perspective: 1000px;
						perspective: 1000px;
						-webkit-transition: opacity 0.5s, visibility 0s 0.5s;
						-moz-transition: opacity 0.5s, visibility 0s 0.5s;
						transition: opacity 0.5s, visibility 0s 0.5s;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?>-open .slideshow<?php echo $Total_Soft_Gallery_Video; ?>
					{
						opacity: 1;
						visibility: visible;
						-webkit-transition: opacity 0.5s;
						-moz-transition: opacity 0.5s;
						transition: opacity 0.5s;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul
					{
						width: 100%;
						height: 100%;
						-webkit-transform-style: preserve-3d;
						-moz-transform-style: preserve-3d;
						transform-style: preserve-3d;
						-webkit-transform: translate3d(0,0,150px);
						-moz-transform: translate3d(0,0,150px);
						transform: translate3d(0,0,150px);
						-webkit-transition: -webkit-transform 0.5s;
						-moz-transition: -moz-transform 0.5s;
						transition: transform 0.5s;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul.animatable li
					{
						-webkit-transition: -webkit-transform 0.5s;
						-moz-transition: -moz-transform 0.5s;
						transition: transform 0.5s;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?>-open .slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul
					{
						-webkit-transform: translate3d(0,0,0);
						-moz-transform: translate3d(0,0,0);
						transform: translate3d(0,0,0);
						margin: 0;
						list-style:none;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> li
					{
						width: 600px;
						max-width:95%;
						position: absolute;
						left: 50%;
						transform:translateX(-50%);
						-webkit-transform:translateX(-50%);
						-moz-transform:translateX(-50%);
						-ms-transform:translateX(-50%);
						visibility: hidden;
						box-sizing:border-box;
						background:none !important;
						background-color:none !important;
					}
					.container_1 * { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> li.show<?php echo $Total_Soft_Gallery_Video; ?> { visibility: visible; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> li:after
					{
						content: '';
						position: absolute;
						width: 100%;
						height: 100%;
						top: 0;
						left: 0;
						-webkit-transition: opacity 0.3s;
						-moz-transition: opacity 0.3s;
						transition: opacity 0.3s;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> li.current<?php echo $Total_Soft_Gallery_Video; ?>:after
					{
						visibility: hidden;
						opacity: 0;
						-webkit-transition: opacity 0.3s, visibility 0s 0.3s;
						-moz-transition: opacity 0.3s, visibility 0s 0.3s;
						transition: opacity 0.3s, visibility 0s 0.3s;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figure { position: absolute; width: 100%; height: 100%; overflow: hidden; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption { padding-bottom: 20px; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe, .slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video { height:250px; margin: 0; display: block; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption .TotalSoft_GV_GG_SP { overflow-x: hidden; margin-top: 5px; padding-right: 10px; max-height:80px; }
					/* Navigation */
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span
					{
						position: fixed;
						z-index: 1000;
						padding: 3%;
						cursor: pointer;
						background:none !important;
						background-color:none !important;
						width:auto !important;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span:before,.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span:after { content:none; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-prev, .slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-next
					{
						top: 50%;
						-webkit-transform: translateY(-50%);
						-moz-transform: translateY(-50%);
						transform: translateY(-50%);
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-next { right: 0; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-close { top: 5%; right: 0; }
					.grid<?php echo $Total_Soft_Gallery_Video; ?> li { width: 100%; }
					.grid<?php echo $Total_Soft_Gallery_Video; ?> li { width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px; }
					.grid<?php echo $Total_Soft_Gallery_Video; ?> figure { padding: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>px; }
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figure img { border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05;?>px; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p, .main-container { font:inherit; }
					.grid<?php echo $Total_Soft_Gallery_Video; ?> li:hover figure
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'none'){ ?>
							-webkit-filter: none;
							filter:none;
						<?php } else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'blur'){ ?>
							-webkit-filter: blur(2px);
							filter:blur(2px);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'brightness'){ ?>
							-webkit-filter: brightness(120%);
							filter:brightness(120%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'contrast'){ ?>
							-webkit-filter: contrast(150%);
							filter:contrast(150%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'grayscale'){ ?>
							-webkit-filter: grayscale(100%);
							filter:grayscale(100%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'hue-rotate'){ ?>
							-webkit-filter: hue-rotate(90deg);
							filter:hue-rotate(90deg);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'invert'){ ?>
							-webkit-filter: invert(100%);
							filter:invert(100%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'drop-shadow'){ ?>
							-webkit-filter: drop-shadow(0px 0px 3px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>);
							filter:drop-shadow(0px 0px 3px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'opacity'){ ?>
							-webkit-filter: opacity(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07*100;?>%);
							filter:opacity(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07*100;?>%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'saturate'){ ?>
							-webkit-filter: saturate(8);
							filter:saturate(8);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'sepia'){ ?>
							-webkit-filter: sepia(100%);
							filter:sepia(100%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 'contrast-brightness'){ ?>
							-webkit-filter: contrast(120%) brightness(120%);
							filter:contrast(120%) brightness(120%);
						<?php }?>
					}
					.grid<?php echo $Total_Soft_Gallery_Video; ?> figcaption
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;
						margin-top: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>px;
					}
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>px;
						line-height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?> !important;
						text-align: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?> !important;
						border-bottom: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?> !important;
						margin-bottom: 0 !important;
						line-height: 1 !important;
						font-weight: 400 !important;
						text-transform:none !important;
						perspective: 800px;
						transform: translate3d(0, 0, 0);
						-moz-transform: translate3d(0, 0, 0);
						-webkit-transform: translate3d(0, 0, 0);
					}
					.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figcaption p { margin-bottom: 0 !important; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figure
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>px;
						padding: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
						max-width:100%;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> li:after
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>px;
						opacity: 0.8;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?> !important;
						text-align: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?> !important;
						border-bottom: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?> !important;
						margin-bottom: 0 !important;
						line-height: 1 !important;
						font-weight: 400 !important;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p { margin-bottom: 0 !important; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-prev, .slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-next
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-close
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?>;
					}
					.TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position: absolute !important;
						padding: 3px 10px !important;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27=='right'){ echo 'left';} else{ echo 'right';} ?>: 30px !important;
						border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?> !important;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>px !important;
						text-decoration: none !important;
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?> !important;
						line-height: 1 !important;
						font-family: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?> !important;
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
					}
					.TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>:hover
					{
						text-decoration: none !important;
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?> !important;
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
					}
					.TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>:focus
					{
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
						outline: none !important;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li { border:none !important; list-style:none !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li span
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>;
						height:auto !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24 != 'none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> !important;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						line-height:1 !important;
						display:block;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li span:hover:not(.active<?php echo $Total_Soft_Gallery_Video; ?>)
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21;?>;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li span.active<?php echo $Total_Soft_Gallery_Video; ?>
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
					}
					.TotalSoftGV_GVG_LM<?php echo $Total_Soft_Gallery_Video; ?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt6[0]->TotalSoft_GV_2_16;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24 != 'none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.nav-close-RW<?php echo $Total_Soft_Gallery_Video; ?> li.current<?php echo $Total_Soft_Gallery_Video; ?> { position:relative; z-index:9; }
					.TotalSoftGV_GVG_LM<?php echo $Total_Soft_Gallery_Video; ?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21;?>;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption .TotalSoft_GV_GG_SP::-webkit-scrollbar { width: 0.5em; }
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption .TotalSoft_GV_GG_SP::-webkit-scrollbar-track
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>;
					}
					.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption .TotalSoft_GV_GG_SP::-webkit-scrollbar-thumb
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						outline: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
					}
					@media screen and (max-width:700px)
					{
						.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span { cursor:default !important; }
					}
				</style>
				<div class="container_1">
					<div id="grid<?php echo $Total_Soft_Gallery_Video; ?>-gallery" class="grid-gallery<?php echo $Total_Soft_Gallery_Video; ?>">
						<section class="grid<?php echo $Total_Soft_Gallery_Video; ?>-wrap GRWR<?php echo $Total_Soft_Gallery_Video; ?>">
							<ul id="GRU<?php echo $Total_Soft_Gallery_Video; ?>" class="GRU<?php echo $Total_Soft_Gallery_Video; ?> grid<?php echo $Total_Soft_Gallery_Video; ?>" style='margin:0px;list-style:none;max-width:none;'>
								<li class="grid<?php echo $Total_Soft_Gallery_Video; ?>-sizer"></li>
								<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
									<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
										<li class='imgLiii' id="TotalSoft_GV_GVG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
											<figure>
												<img src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="img<?php echo $Total_Soft_GalleryV_Videos[$i]->id;?>"/>
												<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01=='true' || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
													<figcaption>
													<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01=='true'){ ?>
														<h3><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h3>
													<?php }?>
													<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02=='true'){ ?>
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
													<?php }?>
												</figcaption>
												<?php }?>
											</figure>
										</li>
									<?php } else { ?>
										<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
											<li class='imgLiii' id="TotalSoft_GV_GVG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
												<figure>
													<img src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="img<?php echo $Total_Soft_GalleryV_Videos[$i]->id;?>"/>
													<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01=='true' || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
														<figcaption>
														<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01=='true'){ ?>
															<h3><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h3>
														<?php }?>
														<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02=='true'){ ?>
															<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
														<?php }?>
													</figcaption>
													<?php }?>
												</figure>
											</li>
										<?php } else { ?>
											<li class='imgLiii noshow1' style="display: none;" id="TotalSoft_GV_GVG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
												<figure>
													<img src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="img<?php echo $Total_Soft_GalleryV_Videos[$i]->id;?>"/>
													<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01=='true' || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
														<figcaption>
														<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01=='true'){ ?>
															<h3><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h3>
														<?php }?>
														<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02=='true'){ ?>
															<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
														<?php }?>
													</figcaption>
													<?php }?>
												</figure>
											</li>
										<?php }?>
									<?php }?>
								<?php }?>
							</ul>
							<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
								<div class="TotalSoftcenter">
									<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video; ?>">
										<li onclick="Total_Soft_GV_GVG_PageP<?php echo $Total_Soft_Gallery_Video; ?>('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?></span></li>
										<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?>
											<?php if($i==1){ ?>
												<li id="TotalSoft_GV_GVG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_GVG_Page<?php echo $Total_Soft_Gallery_Video; ?>('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active<?php echo $Total_Soft_Gallery_Video; ?>"><?php echo $i;?></span></li>
											<?php } else { ?>
												<li id="TotalSoft_GV_GVG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_GVG_Page<?php echo $Total_Soft_Gallery_Video; ?>('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
											<?php }?>
										<?php }?>
										<li onclick="Total_Soft_GV_GVG_PageN<?php echo $Total_Soft_Gallery_Video; ?>('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?></span></li>
									</ul>
								</div>
							<?php }?>
							<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
								<div class="TotalSoftcenter" id="TotalSoftPageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
									<span class="TotalSoftGV_GVG_LM TotalSoftGV_GVG_LM<?php echo $Total_Soft_Gallery_Video; ?>" onclick="Total_Soft_GV_GVG_PageLM<?php echo $Total_Soft_Gallery_Video; ?>('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
									<input type="text" style="display:none;" id="TotalSoftPage_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
								</div>
							<?php }?>
						</section>
						<section class="slideshow<?php echo $Total_Soft_Gallery_Video; ?>">
							<ul class='nav-close-RW<?php echo $Total_Soft_Gallery_Video; ?>'>
								<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
									<?php if(strpos($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL,'.mp4')>-1){ ?>
										<li class="videocontainer">
											<figure>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22=='true' || $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
													<figcaption>
														<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22=='true'){ ?>
															<h3>
																<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
															</h3>
														<?php }?>
														<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
															<div class="TotalSoft_GV_GG_SP">
																<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
															</div>
														<?php }?>
														<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
															<div style='height:30px;margin-top:10px;text-align:right;'>
																<a class="TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?></a>
															</div>
														<?php }?>
													</figcaption>
												<?php }?>
												<video id="videocontainer_<?php echo $Total_Soft_Gallery_Video; ?>_<?php echo $i;?>" controls poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>">
													<source src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" type="video/mp4">
												</video>
											</figure>
										</li>
									<?php }else{ ?>
										<li class="iframecontainer">
											<figure>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22=='true' || $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
													<figcaption>
														<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22=='true'){ ?>
															<h3>
																<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
															</h3>
														<?php }?>
														<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23=='true' && $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc != ''){ ?>
															<div class="TotalSoft_GV_GG_SP">
																<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
															</div>
														<?php }?>
														<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
															<div style='height:30px;margin-top:10px;text-align:right;'>
																<a class="TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?></a>
															</div>
														<?php }?>
													</figcaption>
												<?php }?>
												<iframe src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" frameborder="0" allowfullscreen></iframe>
											</figure>
										</li>
									<?php }?>
								<?php }?>
							</ul>
							<nav>
								<span class="icon nav-prev"><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>"></i></span>
								<span class="icon nav-next"><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>"></i></span>
								<span class="icon nav-close nav-close-TotalSoft"><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?>"></i></span>
							</nav>
						</section>
					</div>
				</div>
				<input type='text' style='display:none;' class='ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>'>
				<input type='text' style='display:none;' class='VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?>'>
				<input type='text' style='display:none;' class='VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>'>
				<input type='text' style='display:none;' class='countFGTotalSoft<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo count($Total_Soft_GalleryV_Videos); ?>'>
				<input type='text' style='display:none;' class='TotalSoft_Grid_FS<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>'>
				<input type='text' style='display:none;' class='TS_VG_GG_AE_<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>'>
				<input type='text' style='display:none;' class='TS_VG_GG_PP_<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>'>
				<input type='text' style='display:none;' class='TS_VG_GG_PT_<?php echo $Total_Soft_Gallery_Video; ?>' value='<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType;?>'>
				<script src="<?php echo plugins_url('../JS/imagesloaded.pkgd.min.js',__FILE__);?>" type="text/javascript"></script>
				<script src="<?php echo plugins_url('../JS/masonry.pkgd.min.js',__FILE__);?>" type="text/javascript"></script>
				<script src="<?php echo plugins_url('../JS/classie.js',__FILE__);?>" type="text/javascript"></script>
				<script>
					jQuery(document).ready(function(){
						new CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>( document.getElementById( 'grid<?php echo $Total_Soft_Gallery_Video; ?>-gallery' ) );
						var delaytime = 0;
						var TS_VG_GG_AE = jQuery('.TS_VG_GG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.grid<?php echo $Total_Soft_Gallery_Video; ?> li.imgLiii').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_GG_AE == '')
								{
									jQuery(this).css({"display":"block",'opacity':'1'});
								}
								else if(TS_VG_GG_AE == 'fadeIn')
								{
									jQuery(this).css({"display":"block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'moveUp')
								{
									jQuery(this).css({"display":"block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'scaleUp')
								{
									jQuery(this).css({"display":"block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'fallPerspective')
								{
									jQuery(this).css({"display":"block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'fly')
								{
									jQuery(this).css({"display":"block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'flip')
								{
									jQuery(this).css({"display":"block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'helix')
								{
									jQuery(this).css({"display":"block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'popUp')
								{
									jQuery(this).css({"display":"block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
						jQuery(window).resize(function(){
							new CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>( document.getElementById( 'grid<?php echo $Total_Soft_Gallery_Video; ?>-gallery' ) );
						})
						jQuery(".pagination<?php echo $Total_Soft_Gallery_Video; ?> li").click(function(){
							new CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>( document.getElementById( 'grid<?php echo $Total_Soft_Gallery_Video; ?>-gallery' ) );
						})
					})
				</script>
				<script>
					var ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>').val();
					var VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?>').val();
					var VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?>').val();
					var countFGTotalSoft<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.countFGTotalSoft<?php echo $Total_Soft_Gallery_Video; ?>').val();
					var TotalSoft_Grid_FS<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.TotalSoft_Grid_FS<?php echo $Total_Soft_Gallery_Video; ?>').val();
					function Total_Soft_GV_GVG_PagePresp<?php echo $Total_Soft_Gallery_Video; ?>(){
						if(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul').height()<=400)
						{
							jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('display','none');
							jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-close').css('top','0%');
						}
						else
						{
							jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('display','block');
							jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> nav span.nav-close').css('top','0%');
						}
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').css('width',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').height()*16/9));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').css('min-width','100%');
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').css('min-height',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').width()*9/16));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').css('max-height',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').width()*9/16));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').css('margin-left',Math.floor((jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure').width()-jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').width())/2));

						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').css('width',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').height()*16/9));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').css('min-width','100%');
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').css('min-height',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').width()*9/16));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').css('max-height',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').width()*9/16));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').css('margin-left',Math.floor((jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure').width()-jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').width())/2));
						for(i=0;i<=countFGTotalSoft<?php echo $Total_Soft_Gallery_Video; ?>-1;i++)
						{
							if(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).hasClass('videocontainer'))
							{
								jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).css('height',jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).find('figcaption').height()+jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).find('video').height()+90);
							}
							else
							{
								jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).css('height',jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).find('figcaption').height()+jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).find('iframe').height()+90);
							}
							jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).css('top',Math.floor((jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul').height()-jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li').eq(i).height())/2));
						}
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3').css('font-size',Math.floor(VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?>*jQuery(window).width()/(jQuery(window).width()+150)));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('font-size',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('font-size')*jQuery(window).width()/(jQuery(window).width()+150)));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('line-height',jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('font-size'));
						jQuery('.TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>').css('font-size',Math.floor(VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?>*jQuery(window).width()/(jQuery(window).width()+150)));
						jQuery('.grid<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1000));

						jQuery('.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3').css('font-size',Math.floor(TotalSoft_Grid_FS<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()+25))+'px');
						jQuery('.grid-gallery<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3').css('line-height',Math.floor(TotalSoft_Grid_FS<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()+25))+'px');
						if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=450)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width','100%');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=700)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/700)+'px');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=1000)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1000)+'px');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=1500)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1500)+'px');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=1800)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1800)+'px');
						}

						var kj = Math.floor(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1000));
						var TS_VG_GG_PP = parseInt(jQuery('.TS_VG_GG_PP_<?php echo $Total_Soft_Gallery_Video; ?>').val());
						var TS_VG_GG_PT = jQuery('.TS_VG_GG_PT_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						if(TS_VG_GG_PT != 'All'){ if(kj > TS_VG_GG_PP) { kj = TS_VG_GG_PP; } }
						var kl = kj*Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1000);
						var kh = Math.floor((jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width() - kl)/2);
						jQuery('.grid<?php echo $Total_Soft_Gallery_Video; ?>').css('margin','0 '+ kh + 'px');
					}
					jQuery(window).resize(function(){ Total_Soft_GV_GVG_PagePresp<?php echo $Total_Soft_Gallery_Video; ?>(); })
					Total_Soft_GV_GVG_PagePresp<?php echo $Total_Soft_Gallery_Video; ?>();
				</script>
				<script type="text/javascript" src="<?php echo plugins_url('../JS/modernizr.custom.js',__FILE__);?>"></script>
				<script type="text/javascript">
					;( function( window ) {
						'use strict';
						var docElem = window.document.documentElement,
							transEndEventNames = {
								'WebkitTransition': 'webkitTransitionEnd',
								'MozTransition': 'transitionend',
								'OTransition': 'oTransitionEnd',
								'msTransition': 'MSTransitionEnd',
								'transition': 'transitionend'
							},
							transEndEventName<?php echo $Total_Soft_Gallery_Video; ?> = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
							support = {
								transitions : Modernizr.csstransitions,
								support3d : Modernizr.csstransforms3d
							};
						function setTransform<?php echo $Total_Soft_Gallery_Video; ?>( el, transformStr ) {
							el.style.WebkitTransform = transformStr;
							el.style.msTransform = transformStr;
							el.style.transform = transformStr;
						}
						function getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() {
							var client = docElem['clientWidth'],
								inner = window['innerWidth'];
							if( client < inner )
								return inner;
							else
								return client;
						}
						function extend<?php echo $Total_Soft_Gallery_Video; ?>( a, b ) {
							for( var key in b ) 
							{ 
								if( b.hasOwnProperty( key ) ) { a[key] = b[key]; }
							}
							return a;
						}
						function CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>( el, options ) {
							this.el = el;
							this.options<?php echo $Total_Soft_Gallery_Video; ?> = extend<?php echo $Total_Soft_Gallery_Video; ?>( {}, this.options<?php echo $Total_Soft_Gallery_Video; ?> );
							extend<?php echo $Total_Soft_Gallery_Video; ?>( this.options<?php echo $Total_Soft_Gallery_Video; ?>, options );
							this._init<?php echo $Total_Soft_Gallery_Video; ?>();
						}
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype.options<?php echo $Total_Soft_Gallery_Video; ?> = {};
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._init<?php echo $Total_Soft_Gallery_Video; ?> = function() {
							// main grid
							this.grid<?php echo $Total_Soft_Gallery_Video; ?> = this.el.querySelector( 'section.grid<?php echo $Total_Soft_Gallery_Video; ?>-wrap > ul.grid<?php echo $Total_Soft_Gallery_Video; ?>' );
							// main grid items
							this.gridItems<?php echo $Total_Soft_Gallery_Video; ?> = [].slice.call( this.grid<?php echo $Total_Soft_Gallery_Video; ?>.querySelectorAll( 'li:not(.grid<?php echo $Total_Soft_Gallery_Video; ?>-sizer)' ) );
							// items total
							this.itemsCount<?php echo $Total_Soft_Gallery_Video; ?> = this.gridItems<?php echo $Total_Soft_Gallery_Video; ?>.length;
							// slideshow grid
							this.slideshow<?php echo $Total_Soft_Gallery_Video; ?> = this.el.querySelector( 'section.slideshow<?php echo $Total_Soft_Gallery_Video; ?> > ul' );
							// slideshow grid items
							this.slideshowItems<?php echo $Total_Soft_Gallery_Video; ?> = [].slice.call( this.slideshow<?php echo $Total_Soft_Gallery_Video; ?>.children );
							// index of current slideshow item
							this.current<?php echo $Total_Soft_Gallery_Video; ?> = -1;
							// slideshow control buttons
							this.ctrlPrev<?php echo $Total_Soft_Gallery_Video; ?> = this.el.querySelector( 'section.slideshow<?php echo $Total_Soft_Gallery_Video; ?> > nav > span.nav-prev' );
							this.ctrlNext<?php echo $Total_Soft_Gallery_Video; ?> = this.el.querySelector( 'section.slideshow<?php echo $Total_Soft_Gallery_Video; ?> > nav > span.nav-next' );
							this.ctrlClose<?php echo $Total_Soft_Gallery_Video; ?> = this.el.querySelector( '.nav-close-RW<?php echo $Total_Soft_Gallery_Video; ?>' );
							this.ctrlClose2<?php echo $Total_Soft_Gallery_Video; ?> = this.el.querySelector( 'section.slideshow<?php echo $Total_Soft_Gallery_Video; ?> > nav > span.nav-close' );
							// init masonry grid
							this._initMasonry<?php echo $Total_Soft_Gallery_Video; ?>();
							// init events
							this._initEvents<?php echo $Total_Soft_Gallery_Video; ?>();
						};
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._initMasonry<?php echo $Total_Soft_Gallery_Video; ?> = function() {
							var grid<?php echo $Total_Soft_Gallery_Video; ?> = this.grid<?php echo $Total_Soft_Gallery_Video; ?>;
							imagesLoaded( grid<?php echo $Total_Soft_Gallery_Video; ?>, function() {
								new Masonry( grid<?php echo $Total_Soft_Gallery_Video; ?>, {
									itemSelector: 'li',
									columnWidth: grid<?php echo $Total_Soft_Gallery_Video; ?>.querySelector( '.grid<?php echo $Total_Soft_Gallery_Video; ?>-sizer' )
								});
							});
						};
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._initEvents<?php echo $Total_Soft_Gallery_Video; ?> = function() {
							var self = this;
							// open the slideshow when clicking on the main grid items
							this.gridItems<?php echo $Total_Soft_Gallery_Video; ?>.forEach( function( item, idx ) {
								item.addEventListener( 'click', function() {
									self._openSlideshow<?php echo $Total_Soft_Gallery_Video; ?>( idx );
								} );
							} );
							// slideshow controls
							this.ctrlPrev<?php echo $Total_Soft_Gallery_Video; ?>.addEventListener( 'click', function() { self._navigate<?php echo $Total_Soft_Gallery_Video; ?>( 'prev' ); } );
							this.ctrlNext<?php echo $Total_Soft_Gallery_Video; ?>.addEventListener( 'click', function() { self._navigate<?php echo $Total_Soft_Gallery_Video; ?>( 'next' ); } );
							this.ctrlClose<?php echo $Total_Soft_Gallery_Video; ?>.addEventListener( 'click', function() { self._closeSlideshow<?php echo $Total_Soft_Gallery_Video; ?>(); } );
							this.ctrlClose2<?php echo $Total_Soft_Gallery_Video; ?>.addEventListener( 'click', function() { self._closeSlideshow<?php echo $Total_Soft_Gallery_Video; ?>(); } );
							// window resize
							window.addEventListener( 'resize', function() { self._resizeHandler(); } );
							// keyboard navigation events
							document.addEventListener( 'keydown', function( ev ) {
								if ( self.isSlideshowVisible<?php echo $Total_Soft_Gallery_Video; ?> ) {
									var keyCode = ev.keyCode || ev.which;
									switch (keyCode) {
										case 37:
											self._navigate<?php echo $Total_Soft_Gallery_Video; ?>( 'prev' );
											break;
										case 39:
											self._navigate<?php echo $Total_Soft_Gallery_Video; ?>( 'next' );
											break;
										case 27:
											self._closeSlideshow<?php echo $Total_Soft_Gallery_Video; ?>();
											break;
									}
								}
							} );
							// trick to prevent scrolling when slideshow is visible
							window.addEventListener( 'scroll', function() {
								if ( self.isSlideshowVisible<?php echo $Total_Soft_Gallery_Video; ?> ) 
								{
									window.scrollTo( self.scrollPosition ? self.scrollPosition.x : 0, self.scrollPosition ? self.scrollPosition.y : 0 );
								}
								else 
								{
									self.scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
								}
							});
						};
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._openSlideshow<?php echo $Total_Soft_Gallery_Video; ?> = function( pos ) {
							this.isSlideshowVisible<?php echo $Total_Soft_Gallery_Video; ?> = true;
							this.current<?php echo $Total_Soft_Gallery_Video; ?> = pos;
							classie.addClass( this.el, 'slideshow<?php echo $Total_Soft_Gallery_Video; ?>-open' );
							/* position slideshow items */
							// set viewport items (current, next and previous)
							this._setViewportItems<?php echo $Total_Soft_Gallery_Video; ?>();
							// add class "current" and "show" to currentItem
							classie.addClass( this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>, 'current<?php echo $Total_Soft_Gallery_Video; ?>' );
							classie.addClass( this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
							if(jQuery(this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).hasClass('videocontainer'))
							{
								var videoid = jQuery(this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('video').attr('id');
								document.getElementById(videoid).play();
							}
							else
							{
								jQuery(this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('iframe').attr('src', jQuery(this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('iframe').attr('src').split('?autoplay=0')[0]+'?autoplay=1;rel=0;iv_load_policy=3');
							}
							// add class show to next and previous items
							// position previous item on the left side and the next item on the right side
							if( this.prevItem<?php echo $Total_Soft_Gallery_Video; ?> ) {
								classie.addClass( this.prevItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
								var translateVal = Number( -1 * ( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 + this.prevItem<?php echo $Total_Soft_Gallery_Video; ?>.offsetWidth / 2 ) );
								setTransform<?php echo $Total_Soft_Gallery_Video; ?>( this.prevItem<?php echo $Total_Soft_Gallery_Video; ?>, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)' );
							}
							if( this.nextItem<?php echo $Total_Soft_Gallery_Video; ?> ) {
								classie.addClass( this.nextItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
								var translateVal = Number( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 - this.nextItem<?php echo $Total_Soft_Gallery_Video; ?>.offsetWidth / 2 );
								setTransform<?php echo $Total_Soft_Gallery_Video; ?>( this.nextItem<?php echo $Total_Soft_Gallery_Video; ?>, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)' );
							}
						};
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._navigate<?php echo $Total_Soft_Gallery_Video; ?> = function( dir ) {
							if( this.isAnimating ) return;
							if( dir === 'next' && this.current<?php echo $Total_Soft_Gallery_Video; ?> === this.itemsCount<?php echo $Total_Soft_Gallery_Video; ?> - 1 ||  dir === 'prev' && this.current<?php echo $Total_Soft_Gallery_Video; ?> === 0  ) {
								this._closeSlideshow<?php echo $Total_Soft_Gallery_Video; ?>();
								return;
							}
							this.isAnimating = true;
							// reset viewport items
							this._setViewportItems<?php echo $Total_Soft_Gallery_Video; ?>();
							var self = this,
								itemWidth = this.currentItem<?php echo $Total_Soft_Gallery_Video; ?>.offsetWidth,
								// positions for the centered/current item, both the side items and the incoming ones
								transformLeftStr = support.support3d ? 'translate3d(-' + Number( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 + itemWidth / 2 ) + 'px, 0, -150px)' : 'translate(-' + Number( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 + itemWidth / 2 ) + 'px)',
								transformRightStr = support.support3d ? 'translate3d(' + Number( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 - itemWidth / 2 ) + 'px, 0, -150px)' : 'translate(' + Number( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 + itemWidth / 2 ) + 'px)',
								transformCenterStr = '', transformOutStr, transformIncomingStr,
								// incoming item
								incomingItem<?php echo $Total_Soft_Gallery_Video; ?>;
							if( dir === 'next' ) {
								transformOutStr = support.support3d ? 'translate3d( -' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px, 0, -150px )' : 'translate(-' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px)';
								transformIncomingStr = support.support3d ? 'translate3d( ' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px, 0, -150px )' : 'translate(' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px)';
							}
							else {
								transformOutStr = support.support3d ? 'translate3d( ' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px, 0, -150px )' : 'translate(' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px)';
								transformIncomingStr = support.support3d ? 'translate3d( -' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 - itemWidth / 2 ) + 'px, 0, -150px )' : 'translate(-' + Number( (getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() * 2) / 2 + itemWidth / 2 ) + 'px)';
							}
							// remove class animatable from the slideshow grid (if it has already)
							classie.removeClass( self.slideshow<?php echo $Total_Soft_Gallery_Video; ?>, 'animatable' );
							if( dir === 'next' && this.current<?php echo $Total_Soft_Gallery_Video; ?> < this.itemsCount<?php echo $Total_Soft_Gallery_Video; ?> - 2 || dir === 'prev' && this.current<?php echo $Total_Soft_Gallery_Video; ?> > 1 ) {
								// we have an incoming item!
								incomingItem<?php echo $Total_Soft_Gallery_Video; ?> = this.slideshowItems<?php echo $Total_Soft_Gallery_Video; ?>[ dir === 'next' ? this.current<?php echo $Total_Soft_Gallery_Video; ?> + 2 : this.current<?php echo $Total_Soft_Gallery_Video; ?> - 2 ];
								setTransform<?php echo $Total_Soft_Gallery_Video; ?>( incomingItem<?php echo $Total_Soft_Gallery_Video; ?>, transformIncomingStr );
								classie.addClass( incomingItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
							}
							var slide<?php echo $Total_Soft_Gallery_Video; ?> = function() {
								// add class animatable to the slideshow grid
								classie.addClass( self.slideshow<?php echo $Total_Soft_Gallery_Video; ?>, 'animatable' );
								// overlays:
								if(jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).hasClass('videocontainer'))
								{
									
									var videoid = jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('video').attr('id');
									document.getElementById(videoid).pause();
								}
								else
								{
									jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('iframe').attr('src', jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('iframe').attr('src').split('?autoplay=1')[0]+'?autoplay=0');
								}
								classie.removeClass( self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>, 'current<?php echo $Total_Soft_Gallery_Video; ?>' );
								var nextCurrent = dir === 'next' ? self.nextItem<?php echo $Total_Soft_Gallery_Video; ?> : self.prevItem<?php echo $Total_Soft_Gallery_Video; ?>;
								classie.addClass( nextCurrent, 'current<?php echo $Total_Soft_Gallery_Video; ?>' );
								if(jQuery(nextCurrent).hasClass('videocontainer'))
								{
									var videoid = jQuery(nextCurrent).find('video').attr('id');
									document.getElementById(videoid).play();
								}
								else
								{
									jQuery(nextCurrent).find('iframe').attr('src', jQuery(nextCurrent).find('iframe').attr('src').split('?autoplay=0')[0]+'?autoplay=1;rel=0;iv_load_policy=3');
								}
								setTransform<?php echo $Total_Soft_Gallery_Video; ?>( self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>, dir === 'next' ? transformLeftStr : transformRightStr );
								if( self.nextItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
								{
									setTransform<?php echo $Total_Soft_Gallery_Video; ?>( self.nextItem<?php echo $Total_Soft_Gallery_Video; ?>, dir === 'next' ? transformCenterStr : transformOutStr );
								}
								if( self.prevItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
								{
									setTransform<?php echo $Total_Soft_Gallery_Video; ?>( self.prevItem<?php echo $Total_Soft_Gallery_Video; ?>, dir === 'next' ? transformOutStr : transformCenterStr );
								}
								if( incomingItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
								{
									setTransform<?php echo $Total_Soft_Gallery_Video; ?>( incomingItem<?php echo $Total_Soft_Gallery_Video; ?>, dir === 'next' ? transformRightStr : transformLeftStr );
								}
								var onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?> = function( ev ) {
									if( support.transitions ) 
									{
										if( ev.propertyName.indexOf( 'transform' ) === -1 ) return false;
										this.removeEventListener( transEndEventName<?php echo $Total_Soft_Gallery_Video; ?>, onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?> );
									}
									if( self.prevItem<?php echo $Total_Soft_Gallery_Video; ?> && dir === 'next' ) 
									{
										classie.removeClass( self.prevItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
									}
									else if( self.nextItem<?php echo $Total_Soft_Gallery_Video; ?> && dir === 'prev' ) 
									{
										classie.removeClass( self.nextItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
									}
									if( dir === 'next' ) 
									{
										self.prevItem<?php echo $Total_Soft_Gallery_Video; ?> = self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>;
										self.currentItem<?php echo $Total_Soft_Gallery_Video; ?> = self.nextItem<?php echo $Total_Soft_Gallery_Video; ?>;
										if( incomingItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
										{
											self.nextItem<?php echo $Total_Soft_Gallery_Video; ?> = incomingItem<?php echo $Total_Soft_Gallery_Video; ?>;
										}
									}
									else 
									{
										self.nextItem<?php echo $Total_Soft_Gallery_Video; ?> = self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>;
										self.currentItem<?php echo $Total_Soft_Gallery_Video; ?> = self.prevItem<?php echo $Total_Soft_Gallery_Video; ?>;
										if( incomingItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
										{
											self.prevItem<?php echo $Total_Soft_Gallery_Video; ?> = incomingItem<?php echo $Total_Soft_Gallery_Video; ?>;
										}
									}
									self.current<?php echo $Total_Soft_Gallery_Video; ?> = dir === 'next' ? self.current<?php echo $Total_Soft_Gallery_Video; ?> + 1 : self.current<?php echo $Total_Soft_Gallery_Video; ?> - 1;
									self.isAnimating = false;
								};
								if( support.transitions ) 
								{
									self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>.addEventListener( transEndEventName<?php echo $Total_Soft_Gallery_Video; ?>, onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?> );
								}
								else 
								{
									onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?>();
								}
							};
							setTimeout( slide<?php echo $Total_Soft_Gallery_Video; ?>, 25 );
						}
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._closeSlideshow<?php echo $Total_Soft_Gallery_Video; ?> = function( pos ) {
							// remove class slideshow-open from the grid gallery elem
							classie.removeClass( this.el, 'slideshow<?php echo $Total_Soft_Gallery_Video; ?>-open' );
							// remove class animatable from the slideshow grid
							classie.removeClass( this.slideshow<?php echo $Total_Soft_Gallery_Video; ?>, 'animatable' );
							var self = this,
								onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?> = function( ev ) {
									if( support.transitions ) 
									{
										if( ev.target.tagName.toLowerCase() !== 'ul' ) return;
										this.removeEventListener( transEndEventName<?php echo $Total_Soft_Gallery_Video; ?>, onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?> );
									}
									// remove classes show and current from the slideshow items
									classie.removeClass( self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>, 'current<?php echo $Total_Soft_Gallery_Video; ?>' );
									classie.removeClass( self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
									if(jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).hasClass('videocontainer'))
									{
										var videoid = jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('video').attr('id');
										document.getElementById(videoid).pause();
									}
									else
									{
										jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('iframe').attr('src', jQuery(self.currentItem<?php echo $Total_Soft_Gallery_Video; ?>).find('iframe').attr('src').split('?autoplay=1')[0]+'?autoplay=0');
									}
									if( self.prevItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
									{
										classie.removeClass( self.prevItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
									}
									if( self.nextItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
									{
										classie.removeClass( self.nextItem<?php echo $Total_Soft_Gallery_Video; ?>, 'show<?php echo $Total_Soft_Gallery_Video; ?>' );
									}
									// also reset any transforms for all the items
									self.slideshowItems<?php echo $Total_Soft_Gallery_Video; ?>.forEach( function( item ) { setTransform<?php echo $Total_Soft_Gallery_Video; ?>( item, '' ); } );
									self.isSlideshowVisible<?php echo $Total_Soft_Gallery_Video; ?> = false;
								};
							if( support.transitions ) 
							{
								this.el.addEventListener( transEndEventName<?php echo $Total_Soft_Gallery_Video; ?>, onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?> );
							}
							else 
							{
								onEndTransitionFn<?php echo $Total_Soft_Gallery_Video; ?>();
							}
						};
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._setViewportItems<?php echo $Total_Soft_Gallery_Video; ?> = function() {
							this.currentItem<?php echo $Total_Soft_Gallery_Video; ?> = null;
							this.prevItem<?php echo $Total_Soft_Gallery_Video; ?> = null;
							this.nextItem<?php echo $Total_Soft_Gallery_Video; ?><?php echo $Total_Soft_Gallery_Video; ?> = null;
							if( this.current<?php echo $Total_Soft_Gallery_Video; ?> > 0 ) 
							{
								this.prevItem<?php echo $Total_Soft_Gallery_Video; ?> = this.slideshowItems<?php echo $Total_Soft_Gallery_Video; ?>[ this.current<?php echo $Total_Soft_Gallery_Video; ?> - 1 ];
							}
							if( this.current<?php echo $Total_Soft_Gallery_Video; ?> < this.itemsCount<?php echo $Total_Soft_Gallery_Video; ?> - 1 ) 
							{
								this.nextItem<?php echo $Total_Soft_Gallery_Video; ?> = this.slideshowItems<?php echo $Total_Soft_Gallery_Video; ?>[ this.current<?php echo $Total_Soft_Gallery_Video; ?> + 1 ];
							}
							this.currentItem<?php echo $Total_Soft_Gallery_Video; ?> = this.slideshowItems<?php echo $Total_Soft_Gallery_Video; ?>[ this.current<?php echo $Total_Soft_Gallery_Video; ?> ];
						}
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._resizeHandler = function() {
							var self = this;
							function delayed<?php echo $Total_Soft_Gallery_Video; ?>() {
								self._resize<?php echo $Total_Soft_Gallery_Video; ?>();
								self._resizeTimeout<?php echo $Total_Soft_Gallery_Video; ?> = null;
							}
							if ( this._resizeTimeout<?php echo $Total_Soft_Gallery_Video; ?> ) { clearTimeout( this._resizeTimeout<?php echo $Total_Soft_Gallery_Video; ?> ); }
							this._resizeTimeout<?php echo $Total_Soft_Gallery_Video; ?> = setTimeout( delayed<?php echo $Total_Soft_Gallery_Video; ?>, 50 );
						}
						CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>.prototype._resize<?php echo $Total_Soft_Gallery_Video; ?> = function() {
							if ( this.isSlideshowVisible<?php echo $Total_Soft_Gallery_Video; ?> ) 
							{
								// update width value
								if( this.prevItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
								{
									var translateVal = Number( -1 * ( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 + this.prevItem<?php echo $Total_Soft_Gallery_Video; ?>.offsetWidth / 2 ) );
									setTransform<?php echo $Total_Soft_Gallery_Video; ?>( this.prevItem<?php echo $Total_Soft_Gallery_Video; ?>, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)' );
								}
								if( this.nextItem<?php echo $Total_Soft_Gallery_Video; ?> ) 
								{
									var translateVal = Number( getViewportW<?php echo $Total_Soft_Gallery_Video; ?>() / 2 - this.nextItem<?php echo $Total_Soft_Gallery_Video; ?>.offsetWidth / 2 );
									setTransform<?php echo $Total_Soft_Gallery_Video; ?>( this.nextItem<?php echo $Total_Soft_Gallery_Video; ?>, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)' );
								}
							}
						}
						// add to global namespace
						window.CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?> = CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>;
					})( window );
					function Total_Soft_GV_GVG_Page<?php echo $Total_Soft_Gallery_Video; ?>(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
					{
						jQuery("html, body").animate({ scrollTop: jQuery('#GRU'+TotalSoftGV_ID).position().top-100 }, 1000);
						var delaytime = 0;
						var TS_VG_GG_AE = jQuery('.TS_VG_GG_AE_'+TotalSoftGV_ID).val();
						for(i=0;i<TotalSoftCV;i++)
						{
							if(i>=TotalSoftPP*(TotalSoftPage-1) && i<TotalSoftPP*TotalSoftPage)
							{
								delaytime++;
								if(TS_VG_GG_AE == '')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'opacity':'1'});
								}
								else if(TS_VG_GG_AE == 'fadeIn')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'moveUp')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'scaleUp')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'fallPerspective')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'fly')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'flip')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'helix')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_GG_AE == 'popUp')
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
							else
							{
								jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css("display","none");
							}
						}
						new CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>( document.getElementById( 'grid<?php echo $Total_Soft_Gallery_Video; ?>-gallery' ) );
						Total_Soft_GV_GVG_PagePresp1<?php echo $Total_Soft_Gallery_Video; ?>();
						jQuery('.pagination<?php echo $Total_Soft_Gallery_Video; ?> li').each(function(){
							jQuery(this).find('span').removeClass('active<?php echo $Total_Soft_Gallery_Video; ?>');
						})
						jQuery('#TotalSoft_GV_GVG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active<?php echo $Total_Soft_Gallery_Video; ?>');
					}
					function Total_Soft_GV_GVG_PagePresp1<?php echo $Total_Soft_Gallery_Video; ?>(){
						var ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>').val();
						var VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?>').val();
						var VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').css('width',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure iframe').height()*16/9));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').css('width',Math.floor(jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> ul li figure video').height()*16/9));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption h3').css('font-size',Math.floor(VTitlePOpFS<?php echo $Total_Soft_Gallery_Video; ?>*jQuery(window).width()/(jQuery(window).width()+150)));
						jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('line-height',jQuery('.slideshow<?php echo $Total_Soft_Gallery_Video; ?> figcaption p').css('font-size'));
						jQuery('.TotalSoft_GV_GVG_Link<?php echo $Total_Soft_Gallery_Video; ?>').css('font-size',Math.floor(VLinkPOpFS<?php echo $Total_Soft_Gallery_Video; ?>*jQuery(window).width()/(jQuery(window).width()+150)));
						jQuery('.grid<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1000));
						if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=450)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width','100%');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=700)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/700)+'px');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=1000)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1000)+'px');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=1500)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1500)+'px');
						}
						else if(jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()<=1800)
						{
							jQuery('.GRU<?php echo $Total_Soft_Gallery_Video; ?> li').css('width',Math.floor(ImgWidthhhh<?php echo $Total_Soft_Gallery_Video; ?>*jQuery('.GRWR<?php echo $Total_Soft_Gallery_Video; ?>').width()/1800)+'px');
						}
					}
					function Total_Soft_GV_GVG_PageP<?php echo $Total_Soft_Gallery_Video; ?>(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
					{
						var TotalSoftPage='';
						jQuery('.pagination<?php echo $Total_Soft_Gallery_Video; ?> li').each(function(){
							if(jQuery(this).find('span').hasClass('active<?php echo $Total_Soft_Gallery_Video; ?>'))
							{
								if(jQuery(this).find('span').html()!='1')
								{
									TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
									Total_Soft_GV_GVG_Page<?php echo $Total_Soft_Gallery_Video; ?>(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
								}
							}
						})
					}
					function Total_Soft_GV_GVG_PageN<?php echo $Total_Soft_Gallery_Video; ?>(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
					{
						var TotalSoftPage='';
						jQuery('.pagination<?php echo $Total_Soft_Gallery_Video; ?> li').each(function(){
							if(jQuery(this).find('span').hasClass('active<?php echo $Total_Soft_Gallery_Video; ?>'))
							{
								if(jQuery(this).find('span').html()!=TotalSoftPC)
								{
									TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
									Total_Soft_GV_GVG_Page<?php echo $Total_Soft_Gallery_Video; ?>(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
									return false;
								}
							}
						})
					}
					function Total_Soft_GV_GVG_PageLM<?php echo $Total_Soft_Gallery_Video; ?>(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
					{
						var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoftPage_'+TotalSoftGV_ID).val())+1);
						jQuery('#TotalSoftPage_'+TotalSoftGV_ID).val(TotalSoftPage);
						var delaytime = 0;
						var TS_VG_GG_AE = jQuery('.TS_VG_GG_AE_'+TotalSoftGV_ID).val();
						if(TotalSoftPage<=TotalSoftPC)
						{
							for(i=0;i<TotalSoftCV;i++)
							{
								if(i<TotalSoftPP*TotalSoftPage && jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).hasClass('noshow1'))
								{
									delaytime++;
									if(TS_VG_GG_AE == '')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'opacity':'1'});
									}
									else if(TS_VG_GG_AE == 'fadeIn')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'moveUp')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'scaleUp')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'fallPerspective')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'fly')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'flip')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'helix')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_GG_AE == 'popUp')
									{
										jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css({"display":"block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
									}
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).removeClass('noshow1');
								}
								else if(i>=TotalSoftPP*TotalSoftPage)
								{
									jQuery("#TotalSoft_GV_GVG_"+TotalSoftGV_ID+"_"+parseInt(parseInt(i)+1)).css("display","none");
								}
							}
							new CBPGridGallery<?php echo $Total_Soft_Gallery_Video; ?>( document.getElementById( 'grid<?php echo $Total_Soft_Gallery_Video; ?>-gallery' ) );
							Total_Soft_GV_GVG_PagePresp1<?php echo $Total_Soft_Gallery_Video; ?>();
							if(TotalSoftPage==TotalSoftPC)
							{
								jQuery('#TotalSoftPageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
							}
						}
						else
						{
							jQuery('#TotalSoftPageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
						}
					}
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='LightBox Video Gallery'){ ?>
				<script src="<?php echo plugins_url('../JS/jquery.quicksand.js',__FILE__);?>" type="text/javascript"></script>
				<script src="<?php echo plugins_url('../JS/jquery.easing.js',__FILE__);?>" type="text/javascript"></script>
				<script src="<?php echo plugins_url('../JS/script.js',__FILE__);?>" type="text/javascript"></script>
				<style type="text/css">
					.totalsoft-gv-lvg-content<?php echo $Total_Soft_Gallery_Video; ?>, .totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:100%;
						position: relative;
						margin: 0 !important;
						text-align:center;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
					/**** PORTFOLIO STYLES*****/
					.totalsoft-gv-lvg-image-block<?php echo $Total_Soft_Gallery_Video; ?> { display:block; position: relative; width:100%; height:100%; }
					.totalsoft-gv-lvg-image-block<?php echo $Total_Soft_Gallery_Video; ?> img { width: 100%; height: auto; }
					.totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video; ?> li { display:inline-block; overflow: hidden; list-style:none !important; }
					/**** END PORTFOLIO STYLES*****/
					div.pp_overlay<?php echo $Total_Soft_Gallery_Video; ?> { background:#000; display: none; left:0; position:absolute; top:0; width:100% !important; z-index:9500; }
					div.pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?> { display: none; position:absolute; width:100px; z-index:10000; }
					.pp_top<?php echo $Total_Soft_Gallery_Video; ?> { height:20px; position: relative; }
					* html .pp_top<?php echo $Total_Soft_Gallery_Video; ?> { padding:0 20px; }
					.pp_top<?php echo $Total_Soft_Gallery_Video; ?> .pp_left<?php echo $Total_Soft_Gallery_Video; ?> { height:20px; left:0; position:absolute; width:20px; }
					.pp_top<?php echo $Total_Soft_Gallery_Video; ?> .pp_middle<?php echo $Total_Soft_Gallery_Video; ?> { height:20px; left:20px; position:absolute; right:20px; }
					* html .pp_top<?php echo $Total_Soft_Gallery_Video; ?> .pp_middle<?php echo $Total_Soft_Gallery_Video; ?> { left:0; position: static; }
					.pp_top<?php echo $Total_Soft_Gallery_Video; ?> .pp_right<?php echo $Total_Soft_Gallery_Video; ?>
					{
						height:20px;
						left:auto;
						position:absolute;
						right:0;
						top:0;
						width:20px;
					}
					.pp_content<?php echo $Total_Soft_Gallery_Video; ?> { height:40px; }
					.pp_fade<?php echo $Total_Soft_Gallery_Video; ?> { display: none; }
					.pp_content_container<?php echo $Total_Soft_Gallery_Video; ?> { position: relative; text-align: left; width:100%; }
					.pp_content_container<?php echo $Total_Soft_Gallery_Video; ?> .pp_left<?php echo $Total_Soft_Gallery_Video; ?> { padding-left:20px; }
					.pp_content_container<?php echo $Total_Soft_Gallery_Video; ?> .pp_right<?php echo $Total_Soft_Gallery_Video; ?> { padding-right:20px; }
					.pp_content_container<?php echo $Total_Soft_Gallery_Video; ?> .pp_details<?php echo $Total_Soft_Gallery_Video; ?> { float: left; margin:10px 0 2px 0; }
					.pp_description<?php echo $Total_Soft_Gallery_Video; ?> { display: none; margin:0 0 5px 0; }
					.pp_nav<?php echo $Total_Soft_Gallery_Video; ?> { clear: left; float: left; margin:3px 0 0 0; }
					.pp_nav<?php echo $Total_Soft_Gallery_Video; ?> p { float: left; margin:0px 10px; }
					.pp_nav<?php echo $Total_Soft_Gallery_Video; ?> .pp_play<?php echo $Total_Soft_Gallery_Video; ?>,.pp_nav<?php echo $Total_Soft_Gallery_Video; ?> .pp_pause<?php echo $Total_Soft_Gallery_Video; ?>
					{
						float: left;
						margin-right:10px;
						cursor: pointer;
					}
					i.pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>,i.pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>
					{
						display:block;
						float: left;
						margin-top:3px;
						overflow: hidden;
						cursor: pointer;
					}
					.pp_hoverContainer<?php echo $Total_Soft_Gallery_Video; ?> { position:absolute; top:0; width:100%; z-index:2000; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> { left:50%; margin-top: -50px; position:absolute; z-index:10000; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul { float: left; height:35px; margin:0 0 0 5px; overflow: hidden; padding:0; position: relative; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul a { border:1px rgba(0,0,0,0.5) solid; display:block; float: left; height:33px; overflow: hidden; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul a:hover,.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> li.selected a { border-color:#fff; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul a img { border:0; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> li { display:block; float: left; margin:0 5px 0 0; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> li.default a { background: url(../Images/default_thumbnail.gif) 0 0 no-repeat; display:block; height:33px; width:50px; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> li.default a img { display: none; }
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>,.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>
					{
						margin-top:7px !important;
					}
					a.pp_expand<?php echo $Total_Soft_Gallery_Video; ?>,a.pp_contract<?php echo $Total_Soft_Gallery_Video; ?>
					{
						cursor: pointer;
						display: none;
						height:20px;
						position:absolute;
						right:30px;
						text-indent: -10000px;
						top:10px;
						width:20px;
						z-index:20000;
					}
					i.pp_close<?php echo $Total_Soft_Gallery_Video; ?> { display:block; float: right; line-height:22px; margin-right: 15px; cursor: pointer; }
					i.pp_close<?php echo $Total_Soft_Gallery_Video; ?>:hover,.totalsoft-gv-lvg-pl-pa<?php echo $Total_Soft_Gallery_Video; ?>:hover, i.pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>:hover, i.pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>:hover
					{
						opacity: 0.8;
					}
					.pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> { height:20px; position: relative; }
					* html .pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> { padding:0 20px; }
					.pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> .pp_left<?php echo $Total_Soft_Gallery_Video; ?> { height:20px; left:0; position:absolute; width:20px; }
					.pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> .pp_middle<?php echo $Total_Soft_Gallery_Video; ?> { height:20px; left:20px; position:absolute; right:20px; }
					* html .pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> .pp_middle<?php echo $Total_Soft_Gallery_Video; ?> { left:0; position: static; }
					.pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> .pp_right<?php echo $Total_Soft_Gallery_Video; ?>
					{
						height:20px;
						left:auto;
						position:absolute;
						right:0;
						top:0;
						width:20px;
					}
					.pp_loaderIcon<?php echo $Total_Soft_Gallery_Video; ?> { display:block; height:24px; left:50%; margin: -12px 0 0 -12px; position:absolute; top:50%; width:24px; }
					#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?> { line-height:1 !important; }
					#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?> * { margin: 0 !important; }
					#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?> .pp_inline<?php echo $Total_Soft_Gallery_Video; ?> { text-align: left; }
					#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?> .pp_inline<?php echo $Total_Soft_Gallery_Video; ?> p { margin:0 0 15px 0; }
					div.ppt<?php echo $Total_Soft_Gallery_Video; ?> { color:#fff; display: none; font-size:17px; margin:0 0 5px 15px; z-index:9999; }
					.clearfix<?php echo $Total_Soft_Gallery_Video; ?>:after { content: "."; display:block; height:0; clear:both; visibility: hidden; }
					.clearfix<?php echo $Total_Soft_Gallery_Video; ?> { display: inline-block; }
					* html .clearfix<?php echo $Total_Soft_Gallery_Video; ?> { height:1%; }
					.clearfix<?php echo $Total_Soft_Gallery_Video; ?> { display:block; } 
					.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> a 
					{
						background: none !important;
						border: none !important;
						display: none !important;
						height: 146px;
						padding: 2px !important;
						width: 235px;
					}
					.totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video; ?> li
					{
						width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;
						margin: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
						padding:0px !important;
						box-sizing:border-box;
						display:inline-block;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					.totalsoft-gv-lvg-image-block<?php echo $Total_Soft_Gallery_Video; ?> img
					{
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>px;
						margin: 0;
					}
					div.pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>px;
						left:50% !important;
						transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
					}
					div.ppt<?php echo $Total_Soft_Gallery_Video; ?> { display:none !important; }
					.pp_top<?php echo $Total_Soft_Gallery_Video; ?> div { background:none !important; }
					.pp_content_container<?php echo $Total_Soft_Gallery_Video; ?> div { background:none !important; }
					.pp_bottom<?php echo $Total_Soft_Gallery_Video; ?> div { background:none !important; }
					.pp_description<?php echo $Total_Soft_Gallery_Video; ?>
					{
						text-align: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>;
					}
					.totalsoft-gv-lvg-pl-pa<?php echo $Total_Soft_Gallery_Video; ?>
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>;
						margin-top: 3px;
					}
					.totalsoft-gv-lvg-close<?php echo $Total_Soft_Gallery_Video; ?>
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>;
					}
					.totalsoft-gv-lvg-close<?php echo $Total_Soft_Gallery_Video; ?> span
					{
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>;
						margin-left:3px;
					}
					.totalsoft-gv-lvg-nepr<?php echo $Total_Soft_Gallery_Video; ?>
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>; 
					}
					.totalsoft-gv-lvg-text<?php echo $Total_Soft_Gallery_Video; ?>
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36;?>; 
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li { border:none !important; list-style:none !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li span 
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>;
						height:auto !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?> !important;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						line-height:1 !important;
						display:block !important;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li span:hover:not(.active) 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video; ?> li span.active 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>;
					}
					.TotalSoftGV_LVG_LM<?php echo $Total_Soft_Gallery_Video; ?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.TotalSoftGV_LVG_LM<?php echo $Total_Soft_Gallery_Video; ?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?> { position:relative; overflow:hidden; }
					.lImgZoom1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						top:0px;
						left:0px;
						width:100%;
						max-width:none !important;
						-o-transform:rotate(0deg) scale(1,1);
						-ms-transform:rotate(0deg) scale(1,1);
						-moz-transform:rotate(0deg) scale(1,1);
						-webkit-transform:rotate(0deg) scale(1,1);
						transform:rotate(0deg) scale(1,1);
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear !important;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						-ms-transform:rotate(25deg) scale(2,2);
						-moz-transform:rotate(25deg) scale(2,2);
						-o-transform:rotate(25deg) scale(2,2);
						-webkit-transform:rotate(25deg) scale(2,2);
						transform:rotate(25deg) scale(2,2);
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover li { left:none !important; letter-spacing:normal !important; }
					.lImgZoom2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						top:0px;
						left:0px;
						width:100%;
						max-width:none !important;
						-ms-transform:rotate(0deg);
						-moz-transform:rotate(0deg);
						-o-transform:rotate(0deg);
						-webkit-transform:rotate(0deg);
						transform:rotate(0deg);
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
					}
					.pagination<?php echo $Total_Soft_Gallery_Video; ?> li:before { transform:none !important; perspective-origin:800px; }
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:200%;
						left:-50%;
						top:-50%;
						-ms-transform:rotate(-25deg);
						-webkit-transform:rotate(-25deg);
						-moz-transform:rotate(-25deg);
						transform:rotate(-25deg);
					}
					.lImgZoom3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						top:0px;
						left:0px;
						width:100%;
						max-width:none !important;
						-ms-transform:rotate(0deg);
						-moz-transform:rotate(0deg);
						-o-transform:rotate(0deg);
						-webkit-transform:rotate(0deg);
						transform:rotate(0deg);
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom3_<?php echo $Total_Soft_Gallery_Video; ?> { width:150%; }
					.lImgZoom4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						top:0px;
						left:0px;
						width:100%;
						max-width:none !important;
						min-height: 100%;
						-ms-transform:rotate(0deg) scale(1);
						-moz-transform:rotate(0deg) scale(1);
						-o-transform:rotate(0deg) scale(1);
						-webkit-transform:rotate(0deg) scale(1);
						transform:rotate(0deg) scale(1);
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						-ms-transform:rotate(0deg) scale(1.5);
						-moz-transform:rotate(0deg) scale(1.5);
						-o-transform:rotate(0deg) scale(1.5);
						-webkit-transform:rotate(0deg) scale(1.5);
						transform:rotate(0deg) scale(1.5);
					}
					.lImgZoom5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						top:0px;
						right:0px;
						width:100%;
						max-width:none !important;
						-ms-transform:rotate(0deg);
						-moz-transform:rotate(0deg);
						-o-transform:rotate(0deg);
						-webkit-transform:rotate(0deg);
						transform:rotate(0deg);
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom5_<?php echo $Total_Soft_Gallery_Video; ?> { width:150%; }
					.lImgZoom6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						bottom:0px;
						right:0px;
						width:100%;
						max-width:none !important;
						-ms-transform:rotate(0deg);
						-moz-transform:rotate(0deg);
						-o-transform:rotate(0deg);
						-webkit-transform:rotate(0deg);
						transform:rotate(0deg);
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom6_<?php echo $Total_Soft_Gallery_Video; ?> { width:150%; }
					.lImgZoom7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						bottom:0px;
						left:0px;
						width:100%;
						max-width:none !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11/10;?>s linear;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .lImgZoom7_<?php echo $Total_Soft_Gallery_Video; ?> { width:150%; }
					.hovLayTVG1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute;
						top:0px;
						left:0px;
						width:100%;
						height:100%;
						max-width:none !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
						opacity:0;
						transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear;
						-o-transition:all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG1_<?php echo $Total_Soft_Gallery_Video; ?> { opacity: 0.8; }
					.hovLayTVG2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:0% !important;
						left:100% !important;
						width:100% !important;
						height:100% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transform:rotate(-90deg) !important;
						-ms-transform:rotate(-90deg) !important;
						-moz-transform:rotate(-90deg) !important;
						-o-transform:rotate(-90deg) !important;
						-webkit-transform:rotate(-90deg) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						left:0% !important;
						top:0% !important;
						transform:rotate(0deg) !important;
						-ms-transform:rotate(0deg) !important;
						-moz-transform:rotate(0deg) !important;
						-webkit-transform:rotate(0deg) !important;
					}
					.hovLayTVG3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:0% !important;
						left:100% !important;
						width:100% !important;
						height:100% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transform:rotateY(-180deg) !important;
						-ms-transform:rotateY(-180deg) !important;
						-moz-transform:rotateY(-180deg) !important;
						-o-transform:rotateY(-180deg) !important;
						-webkit-transform:rotateY(-180deg) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						left:0% !important;
						top:0% !important;
						transform:rotateY(0deg) !important;
						-ms-transform:rotateY(0deg) !important;
						-moz-transform:rotateY(0deg) !important;
						-o-transform:rotateY(0deg) !important;
						-webkit-transform:rotateY(0deg) !important;
					}
					.hovLayTVG4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:50% !important;
						width:0% !important;
						height:0% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						left:0% !important;
						top:0% !important;
						width:100% !important;
						height:100% !important;
						transform:rotate(0deg) !important;
						-ms-transform:rotate(0deg) !important;
						-moz-transform:rotate(0deg) !important;
						-o-transform:rotate(0deg) !important;
						-webkit-transform:rotate(0deg) !important;
					}
					.hovLayTVG5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:50% !important;
						width:0% !important;
						height:0% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:100% !important;
						height:100% !important;
						transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
					}
					.hovLayTVG6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:50% !important;
						width:0% !important;
						height:0% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:100% !important;
						height:100% !important;
						transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
					}
					.hovLayTVG7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:50% !important;
						width:0% !important;
						height:0% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						left:0% !important;
						top:0% !important;
						width:100% !important;
						height:100% !important;
					}
					.hovLayTVG8_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:0% !important;
						width:100% !important;
						height:0% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						visibility:hidden !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG8_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						top:0% !important;
						height:100% !important;
						visibility:visible !important;
					}
					.hovLayTVG9_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:0% !important;
						left:50% !important;
						width:0% !important;
						height:100% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG9_<?php echo $Total_Soft_Gallery_Video; ?> { left:0% !important; width:100% !important; }
					.hovLayTVG10_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:-100% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG10_<?php echo $Total_Soft_Gallery_Video; ?> { top:0% !important; opacity:0.8 !important; }
					.hovLayTVG11_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:0% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						border:20px solid red !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLayTVG11_<?php echo $Total_Soft_Gallery_Video; ?> { opacity:0.8 !important; }
					.hovLayTVG12_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:0% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						border:20px solid red !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.hovLayTVG13_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:0% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14/10;?>s linear !important;
					}
					.hovTit1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:-55% !important;
						width:100% !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						padding:1px 0px !important;
						margin:0px !important;
						text-align:center !important;
						text-transform:none !important;
						letter-spacing: 0px !important;
						font-weight: 100 !important;
						line-height:1.2 !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit1_<?php echo $Total_Soft_Gallery_Video; ?> { top:5% !important; }
					.hovTit2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:5% !important;
						left:100% !important;
						transform:rotate(-90deg) !important;
						-ms-transform:rotate(-90deg) !important;
						-webkit-transform:rotate(-90deg) !important;
						width:100% !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						padding:1px 0px !important;
						text-align:center !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						left:0% !important;
						transform:rotate(0deg) !important;
						-ms-transform:rotate(0deg) !important;
						-moz-transform:rotate(0deg) !important;
						-o-transform:rotate(0deg) !important;
						-webkit-transform:rotate(0deg) !important;
					}
					.hovTit3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						text-transform: none !important;
						font-weight:normal !important;
						letter-spacing:normal !important;
						top:10% !important;
						left:15% !important;
						width:70% !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:0px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						padding:0px 0px !important;
						text-align:center !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						left:0% !important;
						top:5% !important;
						width:100% !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						opacity:0.8 !important;
						padding:1px 0px !important;
					}
					.hovTit4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:25% !important;
						left:0% !important;
						width:100% !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						padding:1px 0px !important;
						text-align:center !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit4_<?php echo $Total_Soft_Gallery_Video; ?> { top:5% !important; }
					.hovTit5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:5% !important;
						width:100% !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						padding:1px 0px !important;
						text-align:center !important;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.hovTit6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:0% !important;
						width:100% !important;
						display:inline !important;
						padding:0px !important;
						margin:0px !important;
						transform:translateY(-50%) !important;
						-ms-transform:translateY(-50%) !important;
						-moz-transform:translateY(-50%) !important;
						-o-transform:translateY(-50%) !important;
						-webkit-transform:translateY(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						text-align:center !important;
						opacity:1 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit6_<?php echo $Total_Soft_Gallery_Video; ?> 
					{
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16-5;?>px !important;
						opacity:0 !important;
					}
					.hovTit7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:100% !important;
						left:0% !important;
						width:100% !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						text-align:center !important;
						transform:translateY(0%);
						-ms-transform:translateY(0%);
						-webkit-transform:translateY(0%);
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit7_<?php echo $Total_Soft_Gallery_Video; ?> { top:0% !important; }
					.hovTit8_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						right:0% !important;
						width:85% !important;
						display:inline !important;
						padding:0px !important;
						margin:0px !important;
						transform:translateY(-50%) !important;
						-ms-transform:translateY(-50%) !important;
						-moz-transform:translateY(-50%) !important;
						-o-transform:translateY(-50%) !important;
						-webkit-transform:translateY(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						text-align:left !important;
						opacity:1 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.hovTit9_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:40% !important;
						left:0% !important;
						width:100% !important;
						display:inline !important;
						padding:0px !important;
						margin:0px !important;
						transform:translateY(-50%) !important;
						-ms-transform:translateY(-50%) !important;
						-moz-transform:translateY(-50%) !important;
						-o-transform:translateY(-50%) !important;
						-webkit-transform:translateY(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						text-align:center !important;
						opacity:1 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.hovTit10_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:20% !important;
						left:0% !important;
						width:0% !important;
						display:inline !important;
						padding:0px !important;
						margin:0px !important;
						left:50% !important;
						font-size:0px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						text-align:center !important;
						opacity:1 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit10_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:100% !important;
						top:30% !important;
						left:0% !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
					}
					.hovTit11_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:20% !important;
						left:10% !important;
						width:40% !important;
						display:inline !important;
						transform:translateX(0%) !important;
						-ms-transform:translateX(0%) !important;
						-moz-transform:translateX(0%) !important;
						-o-transform:translateX(0%) !important;
						-webkit-transform:translateX(0%) !important;
						padding:0px !important;
						margin:0px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovTit11_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						top:30% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						opacity:1 !important;
					}
					.hovLine1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:10% !important;
						height:10% !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						top:50% !important;
						left:50% !important;
						opacity:0 !important;
						transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						-moz-transform:translateY(-50%) translateX(-50%) !important;
						-o-transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:90% !important;
						height:90% !important;
						opacity:1 !important;
					}
					.hovLine2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:110% !important;
						height:110% !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						top:50% !important;
						left:50% !important;
						opacity:0 !important;
						transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						-moz-transform:translateY(-50%) translateX(-50%) !important;
						-o-transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:90% !important;
						height:90% !important;
						opacity:1 !important;
					}
					.hovLine3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:90% !important;
						height:90% !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						border-right:0px solid #fff !important;
						top:50% !important;
						left:40% !important;
						opacity:0 !important;
						transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						-moz-transform:translateY(-50%) translateX(-50%) !important;
						-o-transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine3_<?php echo $Total_Soft_Gallery_Video; ?> { left:50% !important; opacity:1 !important; }
					.hovLine4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:0% !important;
						height:0% !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						top:50% !important;
						left:10% !important;
						opacity:0 !important;
						transform:translateY(-50%) translateX(0%) !important;
						-ms-transform:translateY(-50%) translateX(0%) !important;
						-moz-transform:translateY(-50%) translateX(0%) !important;
						-o-transform:translateY(-50%) translateX(0%) !important;
						-webkit-transform:translateY(-50%) translateX(0%) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine4_<?php echo $Total_Soft_Gallery_Video; ?> { width:80% !important; opacity:1 !important; }
					.hovLine5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:0% !important;
						height:90% !important;
						border-top:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						border-bottom:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						top:5% !important;
						left:50% !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:80% !important;
						opacity:1 !important;
						left:10% !important;
					}
					.hovLine6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:120px !important;
						height:120px !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						border-radius:50% !important;
						top:100% !important;
						left:100% !important;
						opacity:0 !important;
						transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						-moz-transform:translateY(-50%) translateX(-50%) !important;
						-o-transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						top:50% !important;
						left:50% !important;
						opacity:1 !important;
					}
					.hovLine7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						width:0px !important;
						height:0px !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						top:50% !important;
						left:50% !important;
						opacity:0 !important;
						transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLine7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						width:100px !important;
						height:100px !important;
						transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
						-ms-transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
						-moz-transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
						-o-transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
						opacity:1 !important;
					}
					.hovLink1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:40% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-size:0px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:5px 0px !important;
						text-align:center !important;
						opacity:1 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink1_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
					}
					.hovLink2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:40% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:5px 0px !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink2_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						opacity:1 !important;
					}
					.hovLink3_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:70% !important;
						left:5% !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:5px 0px !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink3_<?php echo $Total_Soft_Gallery_Video; ?> { left:15% !important; opacity:1 !important; }
					.hovLink4_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:90% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:5px 0px !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink4_<?php echo $Total_Soft_Gallery_Video; ?> { left:50% !important; opacity:1 !important; }
					.hovLink5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:80% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:0px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:5px 0px !important;
						text-align:center !important;
						opacity:0 !important;
						border:none !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink5_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						top:50% !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						opacity:1 !important;
					}
					.hovLink6_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:50% !important;
						left:40% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:5px 0px !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink6_<?php echo $Total_Soft_Gallery_Video; ?> { left:50% !important; opacity:1 !important; }
					.hovLink7_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:60% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:0px 7px !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?> !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						backface-visibility: hidden;
						-moz-backface-visibility: hidden;
						-webkit-backface-visibility: hidden;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink7_<?php echo $Total_Soft_Gallery_Video; ?> { opacity:1 !important; }
					.hovLink8_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:-100% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:0px 7px !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?> !important;
						text-align:center !important;
						opacity:1 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink8_<?php echo $Total_Soft_Gallery_Video; ?> { opacity:1 !important; top:60% !important; }
					.hovLink9_<?php echo $Total_Soft_Gallery_Video; ?>
					{
						position:absolute !important;
						top:60% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>;
						font-size:0px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?> !important;
						padding:0px 7px !important;
						border:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?> !important;
						text-align:center !important;
						opacity:0 !important;
						transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-webkit-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-ms-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-moz-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
						-o-transition: all <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34/10;?>s linear !important;
					}
					.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>:hover .hovLink9_<?php echo $Total_Soft_Gallery_Video; ?> 
					{
						opacity:1 !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px !important;
					}
					.hovLink, .hovLink:hover { text-decoration:none !important; box-shadow: none !important; -moz-box-shadow: none !important; -webkit-box-shadow: none !important; box-sizing: border-box !important; -moz-box-sizing: border-box !important; -webkit-box-sizing: border-box !important; }
					.hovLink:focus { border:none; outline: none !important; }
					.totalsoft-gv-lvg-content<?php echo $Total_Soft_Gallery_Video; ?> { overflow: hidden; }
				</style>
				<script type="text/javascript">
					(function($){$.prettyPhoto={};$.fn.prettyPhoto=function(pp_settings){pp_settings=jQuery.extend({animation_speed:'fast',slideshow:false,autoplay_slideshow:false,opacity:0.80,show_title:true,allow_resize:true,default_width:500,default_height:344,counter_separator_label:'/',theme:'facebook',hideflash:false,wmode:'opaque',autoplay:true,modal:false,overlay_gallery:true,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},markup:'<div class="pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>"> \
					      <div class="pp_top<?php echo $Total_Soft_Gallery_Video; ?>"> \
					       <div class="pp_left<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					       <div class="pp_middle<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					       <div class="pp_right<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					      </div> \
					      <div class="pp_content_container<?php echo $Total_Soft_Gallery_Video; ?>"> \
					       <div class="pp_left<?php echo $Total_Soft_Gallery_Video; ?>"> \
					       <div class="pp_right<?php echo $Total_Soft_Gallery_Video; ?>"> \
					        <div class="pp_content<?php echo $Total_Soft_Gallery_Video; ?>"> \
					         <div class="pp_loaderIcon<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					         <div class="pp_fade<?php echo $Total_Soft_Gallery_Video; ?>"> \
					          <a href="#" class="pp_expand<?php echo $Total_Soft_Gallery_Video; ?>" title="Expand the image">Expand</a> \
					          <div class="pp_hoverContainer<?php echo $Total_Soft_Gallery_Video; ?>"> \
					           <a class="pp_next" href="#">next</a> \
					           <a class="pp_previous" href="#">previous</a> \
					          </div> \
					          <div id="pp_full_res<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					          <div class="pp_details<?php echo $Total_Soft_Gallery_Video; ?> clearfix<?php echo $Total_Soft_Gallery_Video; ?>"> \
					           <p class="pp_description<?php echo $Total_Soft_Gallery_Video; ?>"></p> \
					           <i class="totalsoft-gv-lvg-close<?php echo $Total_Soft_Gallery_Video; ?> pp_close<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?></span></i> \
					           <div class="pp_nav<?php echo $Total_Soft_Gallery_Video; ?>"> \
					            <i href="#" class="pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?> totalsoft-gv-lvg-nepr<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>"></i> \
					            <p class="currentTextHolder totalsoft-gv-lvg-text<?php echo $Total_Soft_Gallery_Video; ?>">0/0</p> \
					            <i href="#" class="pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?> totalsoft-gv-lvg-nepr<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>"></i> \
					           </div> \
					          </div> \
					         </div> \
					        </div> \
					       </div> \
					       </div> \
					      </div> \
					      <div class="pp_bottom<?php echo $Total_Soft_Gallery_Video; ?>"> \
					       <div class="pp_left<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					       <div class="pp_middle<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					       <div class="pp_right<?php echo $Total_Soft_Gallery_Video; ?>"></div> \
					      </div> \
					     </div> \
					     <div class="pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>"></div>',gallery_markup:'<div class="pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>"> \
					        <a href="#" class="pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>">Previous</a> \
					        <ul> \
					         {gallery} \
					        </ul> \
					        <a href="#" class="pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>">Next</a> \
					       </div>',image_markup:'<iframe id="fullResImage" src="" frameborder="0" allowfullscreen></iframe>',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline<?php echo $Total_Soft_Gallery_Video; ?> clearfix<?php echo $Total_Soft_Gallery_Video; ?>">{content}</div>',custom_markup:'', mp4_markup: '<video width="{width}" height="{height}" controls><source src="{path}" type="video/mp4"></video>'},pp_settings);var matchedObjects=this,percentBased=false,correctSizes,pp_open,pp_contentHeight,pp_contentWidth,pp_containerHeight,pp_containeTotalSoftidth,windowHeight=$(window).height(),windowWidth=$(window).width(),pp_slideshow;doresize=true,scroll_pos=_get_scroll();$(window).unbind('resize').resize(function(){ _center_overlay();_resize_overlay();});if(pp_settings.keyboard_shortcuts){$(document).unbind('keydown').keydown(function(e){if(typeof $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>!='undefined'){if($pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.is(':visible')){switch(e.keyCode){case 37:$.prettyPhoto.changePage('previous');break;case 39:$.prettyPhoto.changePage('next');break;case 27:if(!settings.modal)
					$.prettyPhoto.close();break;};return false;};};});}
					$.prettyPhoto.initialize=function(){
					  settings=pp_settings;
					  if($.browser.msie&&parseInt($.browser.version)==6)settings.theme="light_square";
					  _buildOverlay(this);
					  if(settings.allow_resize)
					  $(window).scroll(function(){_center_overlay();});
					  _center_overlay();
					  set_position=jQuery.inArray($(this).attr('href'),pp_images);
					  $.prettyPhoto.open();
					  return false;
					}
					$.prettyPhoto.open=function(event){
					  if(typeof settings=="undefined")
					    {
					      settings=pp_settings;
					      if($.browser.msie&&$.browser.version==6)settings.theme="light_square";
					      _buildOverlay(event.target);
					      pp_images=$.makeArray(arguments[0]);
					      pp_titles=(arguments[1])?$.makeArray(arguments[1]):$.makeArray("");
					      pp_descriptions=(arguments[2])?$.makeArray(arguments[2]):$.makeArray("");
					      isSet=(pp_images.length>1)?true:false;
					      set_position=0;
					    }
					  if($.browser.msie&&$.browser.version==6)$('select').css('visibility','hidden');
					  if(settings.hideflash)$('object,embed').css('visibility','hidden');
					  _checkPosition($(pp_images).size());
					  $('.pp_loaderIcon<?php echo $Total_Soft_Gallery_Video; ?>').show();
					  if($ppt<?php echo $Total_Soft_Gallery_Video; ?>.is(':hidden'))$ppt<?php echo $Total_Soft_Gallery_Video; ?>.css('opacity',0).show();
					  $pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>.show().fadeTo(settings.animation_speed,settings.opacity);
					  $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.currentTextHolder').text((set_position+1)+settings.counter_separator_label+$(pp_images).size());
					  $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_description<?php echo $Total_Soft_Gallery_Video; ?>').show().html(unescape(pp_descriptions[set_position]));
					  (settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined")?$ppt<?php echo $Total_Soft_Gallery_Video; ?>.html(unescape(pp_titles[set_position])):$ppt<?php echo $Total_Soft_Gallery_Video; ?>.html('&nbsp;');
					  movie_width=(parseFloat(grab_param('width',pp_images[set_position])))?grab_param('width',pp_images[set_position]):settings.default_width.toString();
					  movie_height=(parseFloat(grab_param('height',pp_images[set_position])))?grab_param('height',pp_images[set_position]):settings.default_height.toString();
					  if(movie_width.indexOf('%')!=-1||movie_height.indexOf('%')!=-1)
					    {
					      movie_height=parseFloat(($(window).height()*parseFloat(movie_height)/100)-150);
					      movie_width=parseFloat(($(window).width()*parseFloat(movie_width)/100)-150);
					      percentBased=true;
					    }
					  else{percentBased=false;}
					  $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.fadeIn(function(){
					    imgPreloader="";
					    switch(_getFileType(pp_images[set_position]))
					    {
					      case'image':imgPreloader=new Image();
					        nextImage=new Image();
					        if(isSet&&set_position>$(pp_images).size())nextImage.src=pp_images[set_position+1];
					        prevImage=new Image();
					        if(isSet&&pp_images[set_position-1])prevImage.src=pp_images[set_position-1];
					        $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?>')[0].innerHTML=settings.image_markup;
					        $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('#fullResImage').attr('src',pp_images[set_position]);
					        imgPreloader.onload=function(){correctSizes=_fitToViewport(imgPreloader.width,imgPreloader.height);
					          _showContent();
					        };
					        imgPreloader.onerror=function(){
					          alert('Image cannot be loaded. Make sure the path is correct and image exist.');
					          $.prettyPhoto.close();
					        };
					        imgPreloader.src=pp_images[set_position];
					      break;
					      case'youtube':correctSizes=_fitToViewport(movie_width,movie_height);
					        movie='http://www.youtube.com/embed/'+grab_param('v',pp_images[set_position]);
					        if(settings.autoplay)movie+="?autoplay=1;rel=0;iv_load_policy=3";
					        toInject=settings.iframe_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,movie);
					      break;
					      case'vimeo':correctSizes=_fitToViewport(movie_width,movie_height);
					        movie_id=pp_images[set_position];
					        var regExp=movie_id.split('vimeo.com/');
					        var match=regExp[1];
					        movie='http://player.vimeo.com/video/'+match+'?title=0&amp;byline=0&amp;portrait=0';
					        if(settings.autoplay)movie+=";autoplay=1;";
					        vimeo_width=correctSizes['width']+'/embed/?moog_width='+correctSizes['width'];
					        toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,movie);
					      break;
					      case'wistia':correctSizes=_fitToViewport(movie_width,movie_height);
					        movie_id=pp_images[set_position];
					        var regExp=movie_id.match(/wistia\.com\/medias\/([a-zA-Z0-9\-_]+)/);
					        var match=regExp[1];       
					        movie='//fast.wistia.net/embed/iframe/'+match+'';
					        toInject=settings.iframe_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,movie);
					      break;
					      case'quicktime':correctSizes=_fitToViewport(movie_width,movie_height);
					        correctSizes['height']+=15;
					        correctSizes['contentHeight']+=15;
					        correctSizes['containerHeight']+=15;
					        toInject=settings.quicktime_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);
					      break;
					      case'flash':correctSizes=_fitToViewport(movie_width,movie_height);
					        flash_vars=pp_images[set_position];
					        flash_vars=flash_vars.substring(pp_images[set_position].indexOf('flashvars')+10,pp_images[set_position].length);
					        filename=pp_images[set_position];
					        filename=filename.substring(0,filename.indexOf('?'));
					        toInject=settings.flash_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+'?'+flash_vars);
					      break;
					      case'iframe':correctSizes=_fitToViewport(movie_width,movie_height);
					        frame_url=pp_images[set_position];
					        frame_url=frame_url.substr(0,frame_url.indexOf('iframe')-1);
					        toInject=settings.iframe_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,frame_url);
					      break;
					      case'custom':correctSizes=_fitToViewport(movie_width,movie_height);
					        toInject=settings.custom_markup;
					      break;
					      case'inline':myClone=$(pp_images[set_position]).clone().css({'width':settings.default_width}).wrapInner('<div id="pp_full_res<?php echo $Total_Soft_Gallery_Video; ?>"><div class="pp_inline<?php echo $Total_Soft_Gallery_Video; ?> clearfix<?php echo $Total_Soft_Gallery_Video; ?>"></div></div>').appendTo($('body'));
					        correctSizes=_fitToViewport($(myClone).width(),$(myClone).height());
					        $(myClone).remove();
					        toInject=settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html());
					      break;
					      case'mp4':correctSizes=_fitToViewport(movie_width,movie_height);
					        toInject=settings.mp4_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,pp_images[set_position]);;
					      break;
					    };
					    if(!imgPreloader)
					    {
					      $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?>')[0].innerHTML=toInject;
					      _showContent();
					    };
					  });
					  return false;
					};
					$.prettyPhoto.changePage=function(direction){currentGalleryPage=0;if(direction=='previous'){set_position--;if(set_position<0){set_position=0;return;};}else if(direction=='next'){set_position++;if(set_position>$(pp_images).size()-1){set_position=0;}}else{set_position=direction;};if(!doresize)doresize=true;$('.pp_contract<?php echo $Total_Soft_Gallery_Video; ?>').removeClass('pp_contract<?php echo $Total_Soft_Gallery_Video; ?>').addClass('pp_expand<?php echo $Total_Soft_Gallery_Video; ?>');_hideContent(function(){$.prettyPhoto.open();});};$.prettyPhoto.changeGalleryPage=function(direction){if(direction=='next'){currentGalleryPage++;if(currentGalleryPage>totalPage){currentGalleryPage=0;};}else if(direction=='previous'){currentGalleryPage--;if(currentGalleryPage<0){currentGalleryPage=totalPage;};}else{currentGalleryPage=direction;};itemsToSlide=(currentGalleryPage==totalPage)?pp_images.length-((totalPage)*itemsPerPage):itemsPerPage;$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> li').each(function(i){$(this).animate({'left':(i*itemWidth)-((itemsToSlide*itemWidth)*currentGalleryPage)});});};$.prettyPhoto.startSlideshow=function(){if(typeof pp_slideshow=='undefined'){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_play<?php echo $Total_Soft_Gallery_Video; ?>').unbind('click').removeClass('pp_play<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>').addClass('pp_pause<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>').click(function(){$.prettyPhoto.stopSlideshow();return false;});pp_slideshow=setInterval($.prettyPhoto.startSlideshow,settings.slideshow);}else{$.prettyPhoto.changePage('next');};}
					$.prettyPhoto.stopSlideshow=function(){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_pause<?php echo $Total_Soft_Gallery_Video; ?>').unbind('click').removeClass('pp_pause<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>').addClass('pp_play<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>').click(function(){$.prettyPhoto.startSlideshow();return false;});clearInterval(pp_slideshow);pp_slideshow=undefined;}
					$.prettyPhoto.close=function(){clearInterval(pp_slideshow);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.stop().find('object,embed').css('visibility','hidden');$('div.pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>,div.ppt<?php echo $Total_Soft_Gallery_Video; ?>,.pp_fade<?php echo $Total_Soft_Gallery_Video; ?>').fadeOut(settings.animation_speed,function(){$(this).remove();});$pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>.fadeOut(settings.animation_speed,function(){if($.browser.msie&&$.browser.version==6)$('select').css('visibility','visible');if(settings.hideflash)$('object,embed').css('visibility','visible');$(this).remove();$(window).unbind('scroll');settings.callback();doresize=true;pp_open=false;delete settings;});}; _showContent=function(){ $('.pp_loaderIcon<?php echo $Total_Soft_Gallery_Video; ?>').hide();$ppt<?php echo $Total_Soft_Gallery_Video; ?>.fadeTo(settings.animation_speed,1);projectedTop=scroll_pos['scrollTop']+((windowHeight/2)-(correctSizes['containerHeight']/2));if(projectedTop<0)projectedTop=0; $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_content<?php echo $Total_Soft_Gallery_Video; ?>').animate({'height':correctSizes['contentHeight']},settings.animation_speed);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.animate({'top':projectedTop,'left':(windowWidth/2)-(correctSizes['containeTotalSoftidth']/2),'width':correctSizes['containeTotalSoftidth']},settings.animation_speed,function(){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_hoverContainer<?php echo $Total_Soft_Gallery_Video; ?>,#fullResImage').height(correctSizes['height']).width(correctSizes['width']);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_fade<?php echo $Total_Soft_Gallery_Video; ?>').fadeIn(settings.animation_speed);if(isSet&&_getFileType(pp_images[set_position])=="image"){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_hoverContainer<?php echo $Total_Soft_Gallery_Video; ?>').show();}else{$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_hoverContainer<?php echo $Total_Soft_Gallery_Video; ?>').hide();}
					if(correctSizes['resized'])$('a.pp_expand<?php echo $Total_Soft_Gallery_Video; ?>,a.pp_contract<?php echo $Total_Soft_Gallery_Video; ?>').fadeIn(settings.animation_speed);if(settings.autoplay_slideshow&&!pp_slideshow&&!pp_open)$.prettyPhoto.startSlideshow();settings.changepicturecallback();pp_open=true;});_insert_gallery();};function _hideContent(callback){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?> object,#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?> embed').css('visibility','hidden');$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_fade<?php echo $Total_Soft_Gallery_Video; ?>').fadeOut(settings.animation_speed,function(){$('.pp_loaderIcon<?php echo $Total_Soft_Gallery_Video; ?>').show();callback();});};function _checkPosition(setCount){if(set_position==setCount-1){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('a.pp_next').css('visibility','hidden');$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('a.pp_next').addClass('disabled').unbind('click');}else{$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('a.pp_next').css('visibility','visible');$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('a.pp_next.disabled').removeClass('disabled').bind('click',function(){$.prettyPhoto.changePage('next');return false;});};if(set_position==0){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('a.pp_previous').css('visibility','hidden').addClass('disabled').unbind('click');}else{$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('a.pp_previous.disabled').css('visibility','visible').removeClass('disabled').bind('click',function(){$.prettyPhoto.changePage('previous');return false;});};(setCount>1)?$('.pp_nav<?php echo $Total_Soft_Gallery_Video; ?>').show():$('.pp_nav<?php echo $Total_Soft_Gallery_Video; ?>').hide();};function _fitToViewport(width,height){resized=false;_getDimensions(width,height);imageWidth=width,imageHeight=height;if(((pp_containeTotalSoftidth>windowWidth)||(pp_containerHeight>windowHeight))&&doresize&&settings.allow_resize&&!percentBased){resized=true,fitting=false;while(!fitting){if((pp_containeTotalSoftidth>windowWidth)){imageWidth=(windowWidth-50);imageHeight=(height/width)*imageWidth;}else if((pp_containerHeight>windowHeight)){imageHeight=(windowHeight-150);imageWidth=(width/height)*imageHeight;}else{fitting=true;};pp_containerHeight=imageHeight,pp_containeTotalSoftidth=imageWidth;};_getDimensions(imageWidth,imageHeight);};return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(pp_containerHeight),containeTotalSoftidth:Math.floor(pp_containeTotalSoftidth)+40,contentHeight:Math.floor(pp_contentHeight),contentWidth:Math.floor(pp_contentWidth),resized:resized};};function _getDimensions(width,height){width=parseFloat(width);height=parseFloat(height);$pp_details<?php echo $Total_Soft_Gallery_Video; ?>=$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_details<?php echo $Total_Soft_Gallery_Video; ?>');$pp_details<?php echo $Total_Soft_Gallery_Video; ?>.width(width);detailsHeight=parseFloat($pp_details<?php echo $Total_Soft_Gallery_Video; ?>.css('marginTop'))+parseFloat($pp_details<?php echo $Total_Soft_Gallery_Video; ?>.css('marginBottom'));$pp_details<?php echo $Total_Soft_Gallery_Video; ?>=$pp_details<?php echo $Total_Soft_Gallery_Video; ?>.clone().appendTo($('body')).css({'position':'absolute','top':-10000});detailsHeight+=$pp_details<?php echo $Total_Soft_Gallery_Video; ?>.height();detailsHeight=(detailsHeight<=34)?36:detailsHeight;if($.browser.msie&&$.browser.version==7)detailsHeight+=8;$pp_details<?php echo $Total_Soft_Gallery_Video; ?>.remove();pp_contentHeight=height+detailsHeight;pp_contentWidth=width;pp_containerHeight=pp_contentHeight+$ppt<?php echo $Total_Soft_Gallery_Video; ?>.height()+$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_top<?php echo $Total_Soft_Gallery_Video; ?>').height()+$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_bottom<?php echo $Total_Soft_Gallery_Video; ?>').height();pp_containeTotalSoftidth=width;}
					function _getFileType(itemSrc){if(itemSrc.match(/youtube\.com\/watch/i)){return'youtube';}else if(itemSrc.match(/vimeo\.com/i)){return'vimeo';}else if(itemSrc.indexOf('.mov')!=-1){return'quicktime';}else if(itemSrc.indexOf('.swf')!=-1){return'flash';}else if(itemSrc.indexOf('.mp4')!=-1){return'mp4';}else if(itemSrc.indexOf('iframe')!=-1){return'iframe';}else if(itemSrc.indexOf('custom')!=-1){return'custom';}else if(itemSrc.substr(0,1)=='#'){return'inline';}else if(itemSrc.indexOf('wistia')!=-1){return'wistia';}else{return'image';};};function _center_overlay(){if(doresize&&typeof $pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>!='undefined'){scroll_pos=_get_scroll();titleHeight=$ppt<?php echo $Total_Soft_Gallery_Video; ?>.height(),contentHeight=$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.height(),contentwidth=$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.width();projectedTop=(windowHeight/2)+scroll_pos['scrollTop']-(contentHeight/2);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.css({'top':projectedTop,'left':Math.floor((windowWidth/2))+scroll_pos['scrollLeft']-Math.floor((contentwidth/2))});};};function _get_scroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};function _resize_overlay(){windowHeight=$(window).height(),windowWidth=$(window).width();if(typeof $pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>!="undefined")$pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>.height($(document).height());};function _insert_gallery(){if(isSet&&settings.overlay_gallery&&_getFileType(pp_images[set_position])=="image"){itemWidth=52+5;navWidth=(settings.theme=="facebook")?58:38;itemsPerPage=Math.floor((correctSizes['containeTotalSoftidth']-100-navWidth)/itemWidth);itemsPerPage=(itemsPerPage<pp_images.length)?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>,.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>').hide();}else{$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>,.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>').show();};galleryWidth=itemsPerPage*itemWidth+navWidth;$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>').width(galleryWidth).css('margin-left',-Math.floor((galleryWidth/2)));$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul').width(itemsPerPage*itemWidth).find('li.selected').removeClass('selected');goToPage=(Math.floor(set_position/itemsPerPage)<=totalPage)?Math.floor(set_position/itemsPerPage):totalPage;if(itemsPerPage){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>').hide().show().removeClass('disabled');}else{$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>').hide().addClass('disabled');}
					$.prettyPhoto.changeGalleryPage(goToPage);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul li:eq('+set_position+')').addClass('selected');}else{$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_content<?php echo $Total_Soft_Gallery_Video; ?>').unbind('mouseenter mouseleave');$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>').hide();}}
					function _buildOverlay(caller){theRel=$(caller).attr('rel');galleryRegExp=/\[(?:.*)\]/;isSet=(galleryRegExp.exec(theRel))?true:false;pp_images=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return $(n).attr('href');}):$.makeArray($(caller).attr('href'));pp_titles=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return($(n).find('img').attr('alt'))?$(n).find('img').attr('alt'):"";}):$.makeArray($(caller).find('img').attr('alt'));pp_descriptions=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return($(n).attr('title'))?$(n).attr('title'):"";}):$.makeArray($(caller).attr('title'));$('body').append(settings.markup);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>=$('.pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>'),$ppt<?php echo $Total_Soft_Gallery_Video; ?>=$('.ppt<?php echo $Total_Soft_Gallery_Video; ?>'),$pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>=$('div.pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>');if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var i=0;i<pp_images.length;i++){var regex=new RegExp("(.*?)\.(jpg|jpeg|png|gif)$");var results=regex.exec(pp_images[i]);if(!results){classname='default';}else{classname='';}
					toInject+="<li class='"+classname+"'><a href='#'><img src='"+pp_images[i]+"' width='50' alt='' /></a></li>";};toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('#pp_full_res<?php echo $Total_Soft_Gallery_Video; ?>').after(toInject);$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>').click(function(){$.prettyPhoto.changeGalleryPage('next');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>').click(function(){$.prettyPhoto.changeGalleryPage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_content<?php echo $Total_Soft_Gallery_Video; ?>').hover(function(){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>:not(.disabled)').fadeIn();},function(){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?>:not(.disabled)').fadeOut();});itemWidth=52+5;$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_gallery<?php echo $Total_Soft_Gallery_Video; ?> ul li').each(function(i){$(this).css({'position':'absolute','left':i*itemWidth});$(this).find('a').unbind('click').click(function(){$.prettyPhoto.changePage(i);$.prettyPhoto.stopSlideshow();return false;});});};if(settings.slideshow){$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_nav<?php echo $Total_Soft_Gallery_Video; ?>').prepend('<i class="totalsoft-gv-lvg-pl-pa<?php echo $Total_Soft_Gallery_Video; ?> pp_play<?php echo $Total_Soft_Gallery_Video; ?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>"></i>')
					$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_nav<?php echo $Total_Soft_Gallery_Video; ?> .pp_play<?php echo $Total_Soft_Gallery_Video; ?>').click(function(){$.prettyPhoto.startSlideshow();return false;});}
					$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.attr('class','pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?> '+settings.theme);$pp_overlay<?php echo $Total_Soft_Gallery_Video; ?>.css({'opacity':0,'height':$(document).height(),'width':$(document).width()}).bind('click',function(){if(!settings.modal)$.prettyPhoto.close();});$('i.pp_close<?php echo $Total_Soft_Gallery_Video; ?>').bind('click',function(){$.prettyPhoto.close();return false;});$('a.pp_expand<?php echo $Total_Soft_Gallery_Video; ?>').bind('click',function(e){if($(this).hasClass('pp_expand<?php echo $Total_Soft_Gallery_Video; ?>')){$(this).removeClass('pp_expand<?php echo $Total_Soft_Gallery_Video; ?>').addClass('pp_contract<?php echo $Total_Soft_Gallery_Video; ?>');doresize=false;}else{$(this).removeClass('pp_contract<?php echo $Total_Soft_Gallery_Video; ?>').addClass('pp_expand<?php echo $Total_Soft_Gallery_Video; ?>');doresize=true;};_hideContent(function(){$.prettyPhoto.open();});return false;});$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_previous, .pp_nav<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_previous<?php echo $Total_Soft_Gallery_Video; ?>').bind('click',function(){$.prettyPhoto.changePage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder<?php echo $Total_Soft_Gallery_Video; ?>.find('.pp_next, .pp_nav<?php echo $Total_Soft_Gallery_Video; ?> .pp_arrow_next<?php echo $Total_Soft_Gallery_Video; ?>').bind('click',function(){$.prettyPhoto.changePage('next');$.prettyPhoto.stopSlideshow();return false;});_center_overlay();};return this.unbind('click').click($.prettyPhoto.initialize);};function grab_param(name,url){name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(url);return(results==null)?"":results[1];} })(jQuery);
				</script>
				<div class="Tot_GL">
					<input type="text" style="display:none" class=""/>
					<div class="totalsoft-gv-lvg-content<?php echo $Total_Soft_Gallery_Video; ?>">
						<ul class="ulContWidth totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video; ?>" style='padding:0px;'>
							<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
								<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
									<li class="totalsoft-gv-lvg-item2 TotalSoft_GV_LVG_Li" id="TotalSoft_GV_LVG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" style='max-width:100%;'>
										<div class='fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>'>
											<span class="totalsoft-gv-lvg-image-block<?php echo $Total_Soft_Gallery_Video; ?>"> 
												<a class="image-zoom" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" rel="prettyPhoto[gallery_<?php echo $Total_Soft_Gallery_Video; ?>]" title="<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14=='true'){ echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);} ?>">
													<img class='LImg <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>_<?php echo $Total_Soft_Gallery_Video; ?>' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>"/>
													<div class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>_<?php echo $Total_Soft_Gallery_Video; ?>'></div>
													<h2 class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?>_<?php echo $Total_Soft_Gallery_Video; ?>' >
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</h2>
													<div class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>_<?php echo $Total_Soft_Gallery_Video; ?>'></div>
													<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
													<a href='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink ?>'  class='hovLink <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33;?>_<?php echo $Total_Soft_Gallery_Video; ?>' <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
														<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32;?>
													</a>
													<?php } ?>
												</a>
											</span>
										</div>
									</li>
								<?php } else { ?>
									<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?> 
											<li class="totalsoft-gv-lvg-item2 TotalSoft_GV_LVG_Li" id="TotalSoft_GV_LVG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
												<div class='fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>'>
													<span class="totalsoft-gv-lvg-image-block<?php echo $Total_Soft_Gallery_Video; ?>">
														<a class="image-zoom" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" rel="prettyPhoto[gallery_<?php echo $Total_Soft_Gallery_Video; ?>]" title="<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14=='true'){ echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);} ?>">
															<img class='LImg <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>_<?php echo $Total_Soft_Gallery_Video; ?>' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>"/>
															<div class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>_<?php echo $Total_Soft_Gallery_Video; ?>'></div>
															<h2 class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?>_<?php echo $Total_Soft_Gallery_Video; ?>' >
																<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
															</h2>
															<div class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>_<?php echo $Total_Soft_Gallery_Video; ?>'></div>
															<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
															<a href='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink ?>'  class='hovLink <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33;?>_<?php echo $Total_Soft_Gallery_Video; ?>' <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
																<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32;?>
															</a>
															<?php } ?>
														</a>
													</span>
												</div>
											</li>
										<?php } else { ?> 
											<li style="display:none;" class="totalsoft-gv-lvg-item2 TotalSoft_GV_LVG_Li noshow1" id="TotalSoft_GV_LVG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
												<div class='fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>'>
													<span class="totalsoft-gv-lvg-image-block<?php echo $Total_Soft_Gallery_Video; ?>">
														<a class="image-zoom" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" rel="prettyPhoto[gallery_<?php echo $Total_Soft_Gallery_Video; ?>]" title="<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14=='true'){ echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);} ?>">
															<img class='LImg <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>_<?php echo $Total_Soft_Gallery_Video; ?>' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>"/>
															<div class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>_<?php echo $Total_Soft_Gallery_Video; ?>'></div>
															<h2 class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?>_<?php echo $Total_Soft_Gallery_Video; ?>' >
																<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
															</h2>
															<div class='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>_<?php echo $Total_Soft_Gallery_Video; ?>'></div>
															<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
															<a href='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink ?>'  class='hovLink <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33;?>_<?php echo $Total_Soft_Gallery_Video; ?>' <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
																<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32;?>
															</a>
															<?php } ?>
														</a>
													</span>
												</div>
											</li>
										<?php }?>
								<?php }?>
							<?php }?>
							<div class="column-clear"></div>
						</ul>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
							<div class="TotalSoftcenter">
								<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video; ?>">
									<li onclick="Total_Soft_GV_LVG_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?></span></li>
									<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
										<?php if($i==1){ ?>
											<li id="TotalSoft_GV_LVG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_LVG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active"><?php echo $i;?></span></li>
										<?php } else { ?>
											<li id="TotalSoft_GV_LVG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_LVG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
										<?php }?>
									<?php }?>
									<li onclick="Total_Soft_GV_LVG_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?></span></li>
								</ul>
							</div>
						<?php }?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
							<div class="TotalSoftcenter" id="TotalSoft_VG_LVG_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
								<span class="TotalSoftGV_LVG_LM TotalSoftGV_LVG_LM<?php echo $Total_Soft_Gallery_Video; ?>" onclick="Total_Soft_GV_LVG_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
								<input type="text" style="display:none;" id="TotalSoft_VG_LVG_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
							</div>
						<?php } ?>
					</div>
				</div>
				<input type='text' style='display:none;' class='ImWidth' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>' />
				<input type='text' style='display:none;' class='TS_VG_LG_AE_<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_35;?>' />
				<script>
					jQuery(document).ready(function(){
						var ImWidth = jQuery('.ImWidth').val();
						function imH(){
							jQuery('.TotalSoft_GV_LVG_Li').css('width',Math.floor(ImWidth*jQuery('.ulContWidth').width()/2000)+'px');
							if(jQuery('.ulContWidth').width()<=450) { jQuery('.TotalSoft_GV_LVG_Li').css('width','100%'); jQuery('.totalsoft-gv-lvg-content<?php echo $Total_Soft_Gallery_Video;?>').css('overflow','visible'); jQuery('.totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video;?> li').css('margin','5px 0'); }
							else if(jQuery('.ulContWidth').width()<=700) { jQuery('.TotalSoft_GV_LVG_Li').css('width',Math.floor(ImWidth*jQuery('.ulContWidth').width()/700)+'px'); }
							else if(jQuery('.ulContWidth').width()<=1000) { jQuery('.TotalSoft_GV_LVG_Li').css('width',Math.floor(ImWidth*jQuery('.ulContWidth').width()/1000)+'px'); }
							else if(jQuery('.ulContWidth').width()<=1500) { jQuery('.TotalSoft_GV_LVG_Li').css('width',Math.floor(ImWidth*jQuery('.ulContWidth').width()/1500)+'px'); }
							else if(jQuery('.ulContWidth').width()<=1800) { jQuery('.TotalSoft_GV_LVG_Li').css('width',Math.floor(ImWidth*jQuery('.ulContWidth').width()/1800)+'px'); }
							var LImg = jQuery('.totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video;?> li').not('.noshow1').find('.LImg').height();
							jQuery('.fHeightZoom<?php echo $Total_Soft_Gallery_Video; ?>').css('height',LImg);
						}
						jQuery(window).load(function(){ imH(); })
						setTimeout(function(){ imH(); },100)
						jQuery(window).resize(function(){ imH(); })
						var delaytime = 0;
						var TS_VG_LG_AE = jQuery('.TS_VG_LG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.totalsoft-gv-lvg-area<?php echo $Total_Soft_Gallery_Video; ?> .TotalSoft_GV_LVG_Li').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_LG_AE == '')
								{
									jQuery(this).css({'opacity':'1'});
								}
								else if(TS_VG_LG_AE == 'fadeIn')
								{
									jQuery(this).css({'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'moveUp')
								{
									jQuery(this).css({'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'scaleUp')
								{
									jQuery(this).css({'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'fallPerspective')
								{
									jQuery(this).css({'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'fly')
								{
									jQuery(this).css({'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'flip')
								{
									jQuery(this).css({'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'helix')
								{
									jQuery(this).css({'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_LG_AE == 'popUp')
								{
									jQuery(this).css({'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Thumbnails Video'){ ?>
				<script src="<?php echo plugins_url('../JS/jquery.adipoli.js',__FILE__);?>" type="text/javascript"></script>
				<link href="<?php echo plugins_url('../CSS/jquery.fs.boxer.css',__FILE__);?>" rel="stylesheet" type="text/css" media="all">
				<script src="<?php echo plugins_url('../JS/jquery.fs.boxer.js',__FILE__);?>" type="text/javascript"></script>
				<script type="text/javascript">
					jQuery(function(){
						jQuery('.totalsoft_gv_tv_img_<?php echo $Total_Soft_Gallery_Video;?>').adipoli({
							'startEffect'   : '<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>',
							'hoverEffect'   : '<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>',
							'imageOpacity'  : 1,
							'animSpeed'     : <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>,
							'fillColor'     : '<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>',
							'textColor'     : '#ffffff',
							'overlayText'   : '<i class="<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>"></i>',
							'slices'        : <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05;?>,
							'boxCols'       : <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>,
							'boxRows'       : <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>,
							'popOutMargin'  : <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>,
							'popOutShadow'  : <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,
							'popOutShadowC' : '<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>'
						});
					});
				</script>
				<script>
					jQuery(document).ready(function() {
						if(jQuery(window).width() < 820)
						{
							jQuery(".boxer_<?php echo $Total_Soft_Gallery_Video;?>").boxer({ mobile: true });
						}
						else
						{
							jQuery(".boxer_<?php echo $Total_Soft_Gallery_Video;?>").not(".retina, .boxer_fixed, .boxer_top, .boxer_format, .boxer_mobile, .boxer_object").boxer();
						}
						jQuery(".boxer_<?php echo $Total_Soft_Gallery_Video;?>.boxer_object").click(function(e) {
							e.preventDefault();
							e.stopPropagation();
							$.boxer( jQuery('<div class="inline_content"><h2>More Content!</h2><p>This was created by jQuery and loaded into the new Boxer instance.</p></div>') );
						});
						jQuery(window).one("pronto.load", function() {
							jQuery.boxer("close");
							jQuery(".boxer_<?php echo $Total_Soft_Gallery_Video;?>").boxer("destroy");
						});
					});
				</script>
				<style type="text/css">
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li { border:none !important; list-style:none !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span 
					{
						background:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?> !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>;
						height:auto !important;
						line-height: 1 !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?> !important;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						display:block;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span:hover:not(.active) 
					{
						background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> !important;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span.active 
					{
						background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?> !important;
					}
					.TotalSoftGV_TV_LM<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.TotalSoftGV_TV_LM<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
					}
					#boxer-overlay 
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>;
					}
					#boxer 
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20=='true'){ ?> 
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
						<?php }?>
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>px;
						box-shadow: 0 0 25px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>;
					}
					#boxer .boxer-container 
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24=='true'){ ?> 
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>;
						<?php }?>
					}
					#boxer .boxer-caption p 
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>;
						text-align: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>;
					}
					#boxer .boxer-caption { background: none !important; border: none !important; }
					#boxer .boxer-position 
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>px;
						perspective: 800px;
						transform: translate3d(0,0,0);
						-moz-transform: translate3d(0,0,0);
						-webkit-transform: translate3d(0,0,0);
					}
					#boxer .boxer-control 
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>%;
					}
					#boxer .boxer-control.previous:before 
					{
						border-right: 10.4px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>;
					}
					#boxer .boxer-control.next:before 
					{
						border-left: 10.4px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>;
					}
					#boxer .boxer-close 
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?>%;
					}
					#boxer .boxer-close:before 
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36;?>;
					}
					.adipoli-slice { display:block; position:absolute; z-index:15; height:100%; }
					.adipoli-box { display:block; position:absolute; z-index:15; }
					.totalsoft_gv_tv_row p
					{
						position:relative;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						margin:0px !important;
						text-align:center !important;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						-moz-transform:translateY(-50%);
						-o-transform:translateY(-50%);
						z-index: 9999999999;
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>px;
					}
					.boxer_<?php echo $Total_Soft_Gallery_Video;?>
					{
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					.effect-container<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
				</style>
				<div class="effect-container effect-container<?php echo $Total_Soft_Gallery_Video;?>">
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
							<a style='margin:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>px; display: inline-block; max-width: none; border: none;' href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" class="boxer_<?php echo $Total_Soft_Gallery_Video;?> boxer small" data-gallery="video_gallery_<?php echo $Total_Soft_Gallery_Video;?>" title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>"><img class="img-style totalsoft_gv_tv_row totalsoft_gv_tv_img_<?php echo $Total_Soft_Gallery_Video;?>" style="width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>px; height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>px;" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>"/></a>
						<?php } else { ?>
							<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?> 
								<a style='margin:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>px; display: inline-block; max-width: none; border: none;' href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" class="boxer_<?php echo $Total_Soft_Gallery_Video;?> boxer small" id="TotalSoft_GV_TV_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" data-gallery="video_gallery_<?php echo $Total_Soft_Gallery_Video;?>" title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>"><img class="img-style totalsoft_gv_tv_row totalsoft_gv_tv_img_<?php echo $Total_Soft_Gallery_Video;?>" style="width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>px; height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>px;" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>"/></a>
							<?php } else { ?>
								<a style='margin:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>px; display: none; max-width: none; border: none;' href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" class="boxer_<?php echo $Total_Soft_Gallery_Video;?> boxer small noshow1" id="TotalSoft_GV_TV_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" data-gallery="video_gallery_<?php echo $Total_Soft_Gallery_Video;?>" title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>"><img class="img-style totalsoft_gv_tv_row totalsoft_gv_tv_img_<?php echo $Total_Soft_Gallery_Video;?>" style="width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>px; height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>px;" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>"/></a>
							<?php }?>
						<?php }?>
					<?php }?>
					<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
						<div class="TotalSoftcenter">
							<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video;?>">
								<li onclick="Total_Soft_GV_TV_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?></span></li>
								<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
									<?php if($i==1){ ?>
										<li id="TotalSoft_GV_TV_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_TV_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active"><?php echo $i;?></span></li>
									<?php } else { ?>
										<li id="TotalSoft_GV_TV_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_TV_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
									<?php }?>
								<?php }?>
								<li onclick="Total_Soft_GV_TV_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?></span></li>
							</ul>
						</div>
					<?php }?>
					<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
						<div class="TotalSoftcenter" id="TotalSoft_VG_TV_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
							<span class="TotalSoftGV_TV_LM TotalSoftGV_TV_LM<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_TV_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
							<input type="text" style="display:none;" id="TotalSoft_VG_TV_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
						</div>
					<?php } ?>
				</div>
				<input type='text' style='display:none;' class='Totalsoft_Thumb_W' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>'>
				<input type='text' style='display:none;' class='Totalsoft_Thumb_H' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>'>
				<input type='text' style='display:none;' class='Totalsoft_Thumb_PBImgs' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>'>
				<input type='text' style='display:none;' class='Totalsoft_Thumb_FS' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>'>
				<input type='text' style='display:none;' class='TS_VG_TG_AE_<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>'>
				<script>
					jQuery(document).ready(function(){
						var Totalsoft_Thumb_W=parseInt(jQuery('.Totalsoft_Thumb_W').val());
						var Totalsoft_Thumb_H=parseInt(jQuery('.Totalsoft_Thumb_H').val());
						var Totalsoft_Thumb_PBImgs=parseInt(jQuery('.Totalsoft_Thumb_PBImgs').val());
						var Totalsoft_Thumb_FS=parseInt(jQuery('.Totalsoft_Thumb_FS').val());
						function resp(){
							if(jQuery('.img-style').parent().parent().parent().width()<=jQuery('.img-style').width()+2*Totalsoft_Thumb_PBImgs)
							{
								jQuery('.img-style').css('width',jQuery('.img-style').parent().parent().parent().width()-2*Totalsoft_Thumb_PBImgs);
								jQuery('.img-style').css('height',Math.floor((jQuery('.img-style').parent().parent().parent().width()-2*Totalsoft_Thumb_PBImgs)*Totalsoft_Thumb_H/Totalsoft_Thumb_W));
								jQuery('.totalsoft_gv_tv_row p').css('font-size',Math.floor(Totalsoft_Thumb_FS*jQuery('.img-style').parent().parent().parent().width()/Totalsoft_Thumb_W)+'px');
							}
							else
							{
								jQuery('.img-style').css('width',Totalsoft_Thumb_W);
								jQuery('.img-style').css('height',Totalsoft_Thumb_H);
								jQuery('.totalsoft_gv_tv_row p').css('font-size',Totalsoft_Thumb_FS);
							}
						}
						setTimeout(function(){ resp(); },100)
						resp();
						jQuery(window).resize(function(){ resp(); })
						var delaytime = 0;
						var TS_VG_TG_AE = jQuery('.TS_VG_TG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.effect-container<?php echo $Total_Soft_Gallery_Video;?> .boxer').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_TG_AE == '')
								{
									jQuery(this).css({'display':'inline-block','opacity':'1'});
								}
								else if(TS_VG_TG_AE == 'fadeIn')
								{
									jQuery(this).css({'display':'inline-block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'moveUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'scaleUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'fallPerspective')
								{
									jQuery(this).css({'display':'inline-block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'fly')
								{
									jQuery(this).css({'display':'inline-block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'flip')
								{
									jQuery(this).css({'display':'inline-block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'helix')
								{
									jQuery(this).css({'display':'inline-block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_TG_AE == 'popUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Content Popup'){ ?>
				<?php $TotSoft=Array('', 'first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth'); ?>
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/style_common.css',__FILE__);?>"/>
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/style9.css',__FILE__);?>"/>
				<style type="text/css">
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li { border:none !important; list-style:none !important; padding-left:0px !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span 
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>;
						height:auto !important;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						display:block !important;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span:hover:not(.active) 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?>;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span.active 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36;?>;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
					}
					.TotalSoftGV_CP_LM<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.TotalSoftGV_CP_LM<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?>;
					}
					.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> a.info 
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?>;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>px;
					}
					.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> a.info:hover
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>;
					}
					.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> 
					{
						width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;
						height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;
						margin: <?php echo intval($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05/2);?>px !important;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06=='true'){ ?> 
							-webkit-box-shadow: 0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>;
							-moz-box-shadow: 0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>;
							box-shadow: 0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>;
						<?php }?>
						cursor:pointer;
						perspective:800px;
						overflow:hidden;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09!='9'){ ?>
						.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask,.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?> 
						{
							width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;
							height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;
						}
					<?php }?>
					.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> h2 
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?> !important;
						text-align: center;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>;
						text-transform: none !important;
						letter-spacing: 0 !important;
						font-weight:normal !important;
						transform: translate3d(0, 0, 0);
						-moz-transform: translate3d(0, 0, 0);
						-webkit-transform: translate3d(0, 0, 0);
						perspective: 800px;
					}
					.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> p { line-height: 1 !important; }
					.totalsoftview-second h2, .totalsoftview-fourth h2, .totalsoftview-sixth h2, .totalsoftview-tenth h2, .totalsoftview-ninth h2
					{
						border-bottom: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>;
					}
					.totalsoftview-first h2, .totalsoftview-third h2, .totalsoftview-fifth h2, .totalsoftview-seventh h2, .totalsoftview-eighth h2, .totalsoftview-ninth .content<?php echo $Total_Soft_Gallery_Video;?>
					{
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
					}
					.totalsoftview-first .mask, .totalsoftview-second .mask, .totalsoftview-third .mask, .totalsoftview-fourth .mask, .totalsoftview-fifth .mask, .totalsoftview-sixth .mask, .totalsoftview-seventh .mask, .totalsoftview-eighth .mask, .totalsoftview-tenth .mask, .totalsoftview-ninth .mask-1<?php echo $Total_Soft_Gallery_Video;?>, .totalsoftview-ninth .mask-2<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
					}
					.totalsoftview-fifth .mask
					{
						-webkit-transform: translateX(-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						-moz-transform: translateX(-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						-o-transform: translateX(-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						-ms-transform: translateX(-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						transform: translateX(-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
					}
					.totalsoftview-fifth:hover img 
					{
						-webkit-transform: translateX(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						-moz-transform: translateX(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						-o-transform: translateX(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						-ms-transform: translateX(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
						transform: translateX(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px);
					}
					.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?>px;
						line-height: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> !important;
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?> !important;
						text-align: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?> !important;
						letter-spacing: 0 !important;
						text-transform: none !important;
					}
					.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p
					{
						text-align: justify;
						padding-top:0px;
						padding-bottom:0px;
						margin-bottom:0px !important;
						line-height: 1 !important;
					}
					.fResp<?php echo $Total_Soft_Gallery_Video;?> h3 a
					{
						background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?> !important;
						border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?> !important;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>px !important;
						letter-spacing: 0 !important;
						text-transform: none !important;
					}
					.fResp<?php echo $Total_Soft_Gallery_Video;?> h3 a:hover
					{
						background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21;?> !important;
					}
					.TotalSoft_GV_CP_Pop_Icons<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?>;
					}
					.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
					}
					.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
					}
					.popDescr<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar { width: 0.5em; }
					.popDescr<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
					}
					.popDescr<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar-thumb 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>;
						outline: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>;
					}
					@media only screen and (max-width: 820px) { .totalsoftview<?php echo $Total_Soft_Gallery_Video;?> { margin: 10px 0px !important; } }
					.TotalSoft_GV_CP_Main<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}

					<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34 == ''){ ?>
						.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
							border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>;
							max-width:98%;
							transform:translateY(-50%) translateX(-50%);
							-webkit-transform:translateY(-50%) translateX(-50%);
							-ms-transform:translateY(-50%) translateX(-50%);
						}
						.TotalSoft_GV_CP_Pop_Icons { width: 100%; height:0; position: relative; }
						.TotalSoft_GV_CP_Iframe { width: 60%; height: 60%; position: absolute; left: 0; margin-top: 10px; -webkit-transform: translateX(-1200px); -moz-transform: translateX(-1200px); -o-transform: translateX(-1200px); -ms-transform: translateX(-1200px); transform: translateX(-1200px); -webkit-transition: all 0.5s ease-in-out 0.5s; -moz-transition: all 0.5s ease-in-out 0.5s; -o-transition: all 0.5s ease-in-out 0.5s; -ms-transition: all 0.5s ease-in-out 0.5s; transition: all 0.5s ease-in-out 0.5s; -webkit-transition-delay: 0s; -moz-transition-delay: 0s; -o-transition-delay: 0s; -ms-transition-delay: 0s; transition-delay: 0s; overflow: hidden; }
						.TotalSoft_GV_CP_TD { width: 100%; height: calc(100% - 50px); position: relative; right: 0; -webkit-transform: translateX(1200px); -moz-transform: translateX(1200px); -o-transform: translateX(1200px); -ms-transform: translateX(1200px); transform: translateX(1200px); -webkit-transition: all 0.5s ease-in-out 0.5s; -moz-transition: all 0.5s ease-in-out 0.5s; -o-transition: all 0.5s ease-in-out 0.5s; -ms-transition: all 0.5s ease-in-out 0.5s; transition: all 0.5s ease-in-out 0.5s; -webkit-transition-delay: 0s; -moz-transition-delay: 0s; -o-transition-delay: 0s; -ms-transition-delay: 0s; transition-delay: 0s; }
						.TotalSoft_GV_CP_TD h2 { margin: 10px !important; -webkit-transform: translateX(1200px); -moz-transform: translateX(1200px); -o-transform: translateX(1200px); -ms-transform: translateX(1200px); transform: translateX(1200px); -webkit-transition: all 0.5s ease-in-out 0s; -moz-transition: all 0.5s ease-in-out 0s; -o-transition: all 0.5s ease-in-out 0s; -ms-transition: all 0.5s ease-in-out 0s; transition: all 0.5s ease-in-out 0s; }
						.TotalSoft_GV_CP_TD p { padding: 10px; margin: 10px !important; -webkit-transform: translateX(1200px); -moz-transform: translateX(1200px); -o-transform: translateX(1200px); -ms-transform: translateX(1200px); transform: translateX(1200px); -webkit-transition: all 0.5s ease-in-out 0s; -moz-transition: all 0.5s ease-in-out 0s; -o-transition: all 0.5s ease-in-out 0s; -ms-transition: all 0.5s ease-in-out 0s; transition: all 0.5s ease-in-out 0s; max-height: 80%; }
						.popDescr { height:80%; overflow-y: auto; overflow-x: hidden; }
						.TotalSoft_GV_CP_Iframe iframe { width: 100%; height: 100%; position: absolute; top: 0; left: 0; transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -webkit-transform: translate3d(0, 0, 0); perspective: 800px; }
						.TotalSoft_GV_CP_TD h3 { margin: 10px; margin-top:0px !important; padding-right: 10px; text-align: right; -webkit-transform: translateX(1200px); -moz-transform: translateX(1200px); -o-transform: translateX(1200px); -ms-transform: translateX(1200px); transform: translateX(1200px); -webkit-transition: all 0.5s ease-in-out 0s; -moz-transition: all 0.5s ease-in-out 0s; -o-transition: all 0.5s ease-in-out 0s; -ms-transition: all 0.5s ease-in-out 0s; transition: all 0.5s ease-in-out 0s; }
						.TotalSoft_GV_CP_Pop_Icons_1 i.totalsoft, .TotalSoft_GV_CP_Pop_Icons_2 i.totalsoft { -webkit-transform: translate(0, -1200px); -moz-transform: translate(0, -1200px); -o-transform: translate(0, -1200px); -ms-transform: translate(0, -1200px); transform: translate(0, -1200px); -webkit-transition: all 0.5s ease-in-out 0s; -moz-transition: all 0.5s ease-in-out 0s; -o-transition: all 0.5s ease-in-out 0s; -ms-transition: all 0.5s ease-in-out 0s; transition: all 0.5s ease-in-out 0s; cursor: pointer; }
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34 == 'mode01'){ ?>
						.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
							border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>;
							max-width:98%;
							transform:translateY(-50%) translateX(-50%);
							-webkit-transform:translateY(-50%) translateX(-50%);
							-ms-transform:translateY(-50%) translateX(-50%);
						}
						.TotalSoft_GV_CP_Pop_Icons { width: 100%; height: 40px; position: relative; }
						.TotalSoft_GV_CP_Iframe { width: 60%; height: 60%; position: absolute; left: 0; margin-top: 10px; overflow: hidden; }
						.TotalSoft_GV_CP_TD { width: 100%; height: calc(100% - 50px); position: relative; right: 0; }
						.TotalSoft_GV_CP_TD h2 { margin: 10px !important; }
						.TotalSoft_GV_CP_TD p { padding: 10px; margin: 10px !important; max-height: 80%; }
						.popDescr { height:80%; overflow-y: auto; overflow-x: hidden; }
						.TotalSoft_GV_CP_Iframe iframe { width: 100%; height: 100%; position: absolute; top: 0; left: 0; transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -webkit-transform: translate3d(0, 0, 0); perspective: 800px; }
						.TotalSoft_GV_CP_TD h3 { margin: 10px; margin-top:0px !important; padding-right: 10px; text-align: right; }
						.TotalSoft_GV_CP_Pop_Icons_1 i.totalsoft, .TotalSoft_GV_CP_Pop_Icons_2 i.totalsoft { cursor: pointer; }
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(1)
						{
							transform: translate(50%, -50%);
							-ms-transform: translate(50%, -50%);
							-o-transform: translate(50%, -50%);
							-moz-transform: translate(50%, -50%);
							-webkit-transform: translate(50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(2)
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34 == 'mode02'){ ?>
						.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
							border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>;
							max-width:98%;
							transform:translateY(calc(-50% + 200px)) translateX(-50%);
							-webkit-transform:translateY(calc(-50% + 200px)) translateX(-50%);
							-ms-transform:translateY(calc(-50% + 200px)) translateX(-50%);
						}
						.TotalSoft_GV_CP_Pop_Icons { width: 100%; height: 40px; position: relative; }
						.TotalSoft_GV_CP_Iframe { width: 60%; height: 60%; position: absolute; left: 0; margin-top: 10px; overflow: hidden; }
						.TotalSoft_GV_CP_TD { width: 100%; height: calc(100% - 50px); position: relative; right: 0; }
						.TotalSoft_GV_CP_TD h2 { margin: 10px !important; }
						.TotalSoft_GV_CP_TD p { padding: 10px; margin: 10px !important; max-height: 80%; }
						.popDescr { height:80%; overflow-y: auto; overflow-x: hidden; }
						.TotalSoft_GV_CP_Iframe iframe { width: 100%; height: 100%; position: absolute; top: 0; left: 0; transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -webkit-transform: translate3d(0, 0, 0); perspective: 800px; }
						.TotalSoft_GV_CP_TD h3 { margin: 10px; margin-top:0px !important; padding-right: 10px; text-align: right; }
						.TotalSoft_GV_CP_Pop_Icons_1 i.totalsoft, .TotalSoft_GV_CP_Pop_Icons_2 i.totalsoft { cursor: pointer; }
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(1)
						{
							transform: translate(50%, -50%);
							-ms-transform: translate(50%, -50%);
							-o-transform: translate(50%, -50%);
							-moz-transform: translate(50%, -50%);
							-webkit-transform: translate(50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(2)
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34 == 'mode03'){ ?>
						.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
							border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>;
							max-width:98%;
							-webkit-transform: translateY(-50%) translateX(-50%) scale(0.6);
							-moz-transform: translateY(-50%) translateX(-50%) scale(0.6);
							transform: translateY(-50%) translateX(-50%) scale(0.6);
						}
						.TotalSoft_GV_CP_Pop_Icons { width: 100%; height: 40px; position: relative; }
						.TotalSoft_GV_CP_Iframe { width: 60%; height: 60%; position: absolute; left: 0; margin-top: 10px; overflow: hidden; }
						.TotalSoft_GV_CP_TD { width: 100%; height: calc(100% - 50px); position: relative; right: 0; }
						.TotalSoft_GV_CP_TD h2 { margin: 10px !important; }
						.TotalSoft_GV_CP_TD p { padding: 10px; margin: 10px !important; max-height: 80%; }
						.popDescr { height:80%; overflow-y: auto; overflow-x: hidden; }
						.TotalSoft_GV_CP_Iframe iframe { width: 100%; height: 100%; position: absolute; top: 0; left: 0; transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -webkit-transform: translate3d(0, 0, 0); perspective: 800px; }
						.TotalSoft_GV_CP_TD h3 { margin: 10px; margin-top:0px !important; padding-right: 10px; text-align: right; }
						.TotalSoft_GV_CP_Pop_Icons_1 i.totalsoft, .TotalSoft_GV_CP_Pop_Icons_2 i.totalsoft { cursor: pointer; }
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(1)
						{
							transform: translate(50%, -50%);
							-ms-transform: translate(50%, -50%);
							-o-transform: translate(50%, -50%);
							-moz-transform: translate(50%, -50%);
							-webkit-transform: translate(50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(2)
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
					<?php } else { ?>
						.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
							border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>;
							max-width:98%;
							-webkit-transform: translateY(-50%) translateX(-50%) scale(0.6);
							-moz-transform: translateY(-50%) translateX(-50%) scale(0.6);
							transform: translateY(-50%) translateX(-50%) scale(0.6);
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						}
						.TotalSoft_GV_CP_Pop_Icons { width: 100%; height: 40px; position: relative; }
						.TotalSoft_GV_CP_Iframe { width: 60%; height: 60%; position: absolute; left: 0; margin-top: 10px; overflow: hidden; }
						.TotalSoft_GV_CP_TD { width: 100%; height: calc(100% - 50px); position: relative; right: 0; }
						.TotalSoft_GV_CP_TD h2 { margin: 10px !important; }
						.TotalSoft_GV_CP_TD p { padding: 10px; margin: 10px !important; max-height: 80%; }
						.popDescr { height:80%; overflow-y: auto; overflow-x: hidden; }
						.TotalSoft_GV_CP_Iframe iframe { width: 100%; height: 100%; position: absolute; top: 0; left: 0; transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -webkit-transform: translate3d(0, 0, 0); perspective: 800px; }
						.TotalSoft_GV_CP_TD h3 { margin: 10px; margin-top:0px !important; padding-right: 10px; text-align: right; }
						.TotalSoft_GV_CP_Pop_Icons_1 i.totalsoft, .TotalSoft_GV_CP_Pop_Icons_2 i.totalsoft { cursor: pointer; }
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(1)
						{
							transform: translate(50%, -50%);
							-ms-transform: translate(50%, -50%);
							-o-transform: translate(50%, -50%);
							-moz-transform: translate(50%, -50%);
							-webkit-transform: translate(50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(2)
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
						.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft
						{
							transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							-o-transform: translate(-50%, -50%);
							-moz-transform: translate(-50%, -50%);
							-webkit-transform: translate(-50%, -50%)
						}
					<?php }?>
					.TotalSoft_GV_CP_Pop_load_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
						z-index: 1;
						background: rgba(0, 0, 0, 0.1);
						display: none;
					}
					.TotalSoft_GV_CP_Pop_load_<?php echo $Total_Soft_Gallery_Video;?> img
					{
						position: absolute;
						top: 50%;
						left: 50%;
						transform: translate(-50%, -50%);
						-moz-transform: translate(-50%, -50%);
						-webkit-transform: translate(-50%, -50%);
						z-index: 2;
					}
				</style>
				<div class="main TotalSoft_GV_CP_Main TotalSoft_GV_CP_Main<?php echo $Total_Soft_Gallery_Video;?>">
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
							<div class="totalsoftview totalsoftview<?php echo $Total_Soft_Gallery_Video;?> totalsoftview-<?php echo $TotSoft[$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09];?>" onclick="TotalSoft_GV_CP_Cont<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_GalleryV_Videos[$i]->id;?>', '<?php echo $Total_Soft_Gallery_Video;?>')">
								<img src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>"/>
								<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09=='2'){ ?>
									<div class="mask"></div>
									<div class="content content<?php echo $Total_Soft_Gallery_Video;?>">
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
											<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
										<?php }?>
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
										<?php }?>
										<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
												<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
													<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
												</a>
											<?php } else { ?> 
												<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
											<?php }?>
										<?php }?>
									</div>
								<?php } else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09=='9'){ ?>
									<div class="mask mask-1 mask-1<?php echo $Total_Soft_Gallery_Video;?>"></div>
									<div class="mask mask-2 mask-2<?php echo $Total_Soft_Gallery_Video;?>"></div>
									<div class="content content<?php echo $Total_Soft_Gallery_Video;?>">
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
											<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
										<?php }?>
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
										<?php }?>
										<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
												<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
													<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
												</a>
											<?php } else { ?> 
												<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
											<?php }?>
										<?php }?>
									</div>
								<?php } else{ ?>
									<div class="mask">
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
											<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
										<?php }?>
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
										<?php }?>
										<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
												<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
													<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
												</a>
											<?php } else { ?> 
												<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
											<?php }?>
										<?php }?>
									</div>
								<?php }?>
							</div>
						<?php } else { ?>
							<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
								<div class="totalsoftview totalsoftview<?php echo $Total_Soft_Gallery_Video;?> totalsoftview-<?php echo $TotSoft[$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09];?>" id="TotalSoft_GV_CP_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" onclick="TotalSoft_GV_CP_Cont<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_GalleryV_Videos[$i]->id;?>', '<?php echo $Total_Soft_Gallery_Video;?>')">
									<img src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>"/>
									<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09=='2'){ ?>
										<div class="mask"></div>
										<div class="content content<?php echo $Total_Soft_Gallery_Video;?>">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
												<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
											<?php }?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
											<?php }?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
												<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
														<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
													</a>
												<?php } else { ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
												<?php }?>
											<?php }?>
										</div>
									<?php } else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09=='9'){ ?>
										<div class="mask mask-1 mask-1<?php echo $Total_Soft_Gallery_Video;?>"></div>
										<div class="mask mask-2 mask-2<?php echo $Total_Soft_Gallery_Video;?>"></div>
										<div class="content content<?php echo $Total_Soft_Gallery_Video;?>">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
												<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
											<?php }?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
											<?php }?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
												<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
														<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
													</a>
												<?php } else { ?> 
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
												<?php }?>
											<?php }?>
										</div>
									<?php } else{ ?>
										<div class="mask">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
												<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
											<?php }?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
											<?php }?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
												<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
														<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
													</a>
												<?php } else { ?> 
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
												<?php }?>
											<?php }?>
										</div>
									<?php }?>
								</div>
							<?php } else { ?>
								<div class="totalsoftview totalsoftview<?php echo $Total_Soft_Gallery_Video;?> totalsoftview-<?php echo $TotSoft[$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09];?> noshow1" id="TotalSoft_GV_CP_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" style="display:none;" onclick="TotalSoft_GV_CP_Cont<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_GalleryV_Videos[$i]->id;?>', '<?php echo $Total_Soft_Gallery_Video;?>')">
									<img src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>"/>
									<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09=='2'){ ?>
										<div class="mask"></div>
										<div class="content content<?php echo $Total_Soft_Gallery_Video;?>">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
												<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
											<?php }?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
											<?php }?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
												<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
														<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
													</a>
												<?php } else { ?> 
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
												<?php }?>
											<?php }?>
										</div>
									<?php } else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09=='9'){ ?>
										<div class="mask mask-1 mask-1<?php echo $Total_Soft_Gallery_Video;?>"></div>
										<div class="mask mask-2 mask-2<?php echo $Total_Soft_Gallery_Video;?>"></div>
										<div class="content content<?php echo $Total_Soft_Gallery_Video;?>">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
												<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
											<?php }?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
											<?php }?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
												<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
														<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
													</a>
												<?php } else { ?> 
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
												<?php }?>
											<?php }?>
										</div>
									<?php } else{ ?>
										<div class="mask">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11=='true'){ ?>
												<h2><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h2>
											<?php }?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16=='true'){ ?>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
											<?php }?>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!='' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32=='true'){ ?>
												<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){ ?>
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info" target="_blank">
														<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>
													</a>
												<?php } else { ?> 
													<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink?>" class="info"><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?></a>
												<?php }?>
											<?php }?>
										</div>
									<?php }?>
								</div>
							<?php }?>
						<?php }?>
					<?php }?>
				</div>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
					<div class="TotalSoftcenter">
						<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video;?>">
							<li onclick="Total_Soft_GV_CP_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?></span></li>
							<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
								<?php if($i==1){ ?>
									<li id="TotalSoft_GV_CP_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_CP_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active"><?php echo $i;?></span></li>
								<?php } else { ?>
									<li id="TotalSoft_GV_CP_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_CP_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
								<?php }?>
							<?php }?>
							<li onclick="Total_Soft_GV_CP_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?></span></li>
						</ul>
					</div>
				<?php }?>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
					<div class="TotalSoftcenter" id="TotalSoft_VG_CP_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
						<span class="TotalSoftGV_CP_LM TotalSoftGV_CP_LM<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_CP_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
						<input type="text" style="display:none;" id="TotalSoft_VG_CP_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
					</div>
				<?php } ?>
				<div class="TotalSoft_GV_CP_Content TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_CP_Close_Popup<?php echo $Total_Soft_Gallery_Video;?>()"></div>
				<div class="TotalSoft_GV_CP_Popup TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>">
					<div class="TotalSoft_GV_CP_Pop_load_<?php echo $Total_Soft_Gallery_Video;?>">
						<img src="<?php echo plugins_url('../Images/loading.gif',__FILE__);?>">
					</div>
					<div class="TotalSoft_GV_CP_Pop_Icons TotalSoft_GV_CP_Pop_Icons<?php echo $Total_Soft_Gallery_Video;?>">
						<input type="text" style="display:none;" id="TotalSoft_GV_CP_VID_<?php echo $Total_Soft_Gallery_Video;?>">
						<input type="text" style="display:none;" id="TotalSoft_GV_CP_PoM_<?php echo $Total_Soft_Gallery_Video;?>" value="<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_34;?>">
						<div class="TotalSoft_GV_CP_Pop_Icons_1 TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?>">
							<i class="totalsoftleft <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>" onclick="TotalSoft_GV_CP_Left<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_Gallery_Video;?>')"></i>
							<i class="totalsoftright <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31;?>" onclick="TotalSoft_GV_CP_Right<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_Gallery_Video;?>')"></i>
						</div>
						<div class="TotalSoft_GV_CP_Pop_Icons_2 TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?>">
							<i class="<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>" onclick="TotalSoft_GV_CP_Close_Popup<?php echo $Total_Soft_Gallery_Video;?>()"></i>
						</div>
					</div>
					<div class="TotalSoft_GV_CP_Iframe TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>">
						<iframe src=""  frameborder="0" allowfullscreen></iframe>
					</div>
					<div class='fResp fResp<?php echo $Total_Soft_Gallery_Video;?>' style='width:40%;position:absolute;right:0;height:90%'>
						<div class="TotalSoft_GV_CP_TD TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?>">
							<h2></h2>
							<p class='popDescr popDescr<?php echo $Total_Soft_Gallery_Video;?>'></p>
							<h3 class='frsp frsp<?php echo $Total_Soft_Gallery_Video;?>' style='text-align:right'>
								<a style='padding:5px 10px;' href=""><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?></a>
							</h3>
						</div>
					</div>
				</div>
				<input type='text' style='display:none;' class='CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>' />
				<input type='text' style='display:none;' class='CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>' />
				<input type='text' style='display:none;' class='CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>' />
				<input type='text' style='display:none;' class='CPFontSizeVideoTitlePopup<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?>' />
				<input type='text' style='display:none;' class='CPFontSizeVideoLinkPopup<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>' />
				<input type='text' style='display:none;' class='TS_VG_CP_AE_<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33;?>' />
				<script type="text/javascript">
					function TotalSoft_GV_CP_Cont<?php echo $Total_Soft_Gallery_Video;?>(TotalSoftGV_CP_VID, TotalSoftGV_CP_ID)
					{
						jQuery('#TotalSoft_GV_CP_VID_'+TotalSoftGV_CP_ID).val(TotalSoftGV_CP_VID);
						var TotalSoft_GV_CP_PoM = jQuery('#TotalSoft_GV_CP_PoM_'+TotalSoftGV_CP_ID).val();

						jQuery.ajax({
							type: 'POST',
							url: object.ajaxurl,
							data: {
								action: 'TotalSoftGallery_Video_CP_Popup', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
								foobar: TotalSoftGV_CP_VID, // translates into $_POST['foobar'] in PHP
							},
							beforeSend: function(){
								jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','block');
							},
							success: function(response){
								var b=Array();
								var a=response.split('=>');
								for(var i=3;i<a.length;i++)
								{ b[b.length]=a[i].split('[')[0].trim(); }
								b[b.length-1]=b[b.length-1].split(')')[0].trim();
								jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[4]+'?rel=0;iv_load_policy=3');
								jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[0]);
								jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[1]);

								if(TotalSoft_GV_CP_PoM == '')
								{
									jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').animate({'height':'100%',},300);
									jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'top':'50%','left':'50%',},300);
									
									if(jQuery(window).width()>1000)
									{
										jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'width':'1000px','padding-bottom':'500px','border-radius':'0','top':'50%','left':'50%'},500);
									}
									else
									{
										if(jQuery(window).width()<=530)
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'width':'98%','padding-bottom':'0px','height':'320px','border-radius':'0','top':'50%','left':'50%'},500);
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'47%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'62%',});
										}
										else
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'width':'450px','padding-bottom':'0px','height':'400px','border-radius':'0','top':'50%','left':'50%','max-height':'98%','max-width':'98%'},500);
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'55%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'68%'});
										}
									}
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_Icons<?php echo $Total_Soft_Gallery_Video;?>').animate({'height':'40px',},500);
										if(b[2])
										{
											jQuery('.frsp<?php echo $Total_Soft_Gallery_Video;?> a').attr('href',b[2]);
											jQuery('.frsp<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(1)').css({'transform':'translate(50%, -50%)','-ms-transform': 'translate(50%, -50%)', '-o-transform': 'translate(50%, -50%)','-moz-transform': 'translate(50%, -50%)','-webkit-transform': 'translate(50%, -50%)'});
										jQuery('.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft:nth-child(2)').css({'transform':'translate(-50%, -50%)','-ms-transform': 'translate(-50%, -50%)', '-o-transform': 'translate(-50%, -50%)','-moz-transform': 'translate(-50%, -50%)','-webkit-transform': 'translate(-50%, -50%)'});
										jQuery('.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft').css({'transform':'translate(-50%, -50%)','-ms-transform': 'translate(-50%, -50%)', '-o-transform': 'translate(-50%, -50%)','-moz-transform': 'translate(-50%, -50%)','-webkit-transform': 'translate(-50%, -50%)'});
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode01')
								{
									if(b[2]){ jQuery('.frsp<?php echo $Total_Soft_Gallery_Video;?> a').attr('href',b[2]); }

									jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'height':'100%','opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});

									jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'top':'50%','left':'50%',});

									if(jQuery(window).width()>1000)
									{
										jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'1000px','padding-bottom':'500px','border-radius':'0','top':'50%','left':'50%','opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
									}
									else
									{
										if(jQuery(window).width()<=530)
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'98%','padding-bottom':'0px','height':'320px','border-radius':'0','top':'50%','left':'50%','opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'47%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'62%',});
										}
										else
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'450px','padding-bottom':'0px','height':'400px','border-radius':'0','top':'50%','left':'50%','max-height':'98%','max-width':'98%','opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'55%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'68%'});
										}
									}
								}
								else if(TotalSoft_GV_CP_PoM == 'mode02')
								{
									if(b[2]){ jQuery('.frsp<?php echo $Total_Soft_Gallery_Video;?> a').attr('href',b[2]); }

									jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'height':'100%','opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});

									jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'top':'50%','left':'50%',});

									if(jQuery(window).width()>1000)
									{
										jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'1000px','padding-bottom':'500px','border-radius':'0','top':'50%','left':'50%','opacity':'0','animation':'moveUpCP 0.65s ease forwards','-webkit-animation':'moveUpCP 0.65s ease forwards','-moz-animation':'moveUpCP 0.65s ease forwards'});
									}
									else
									{
										if(jQuery(window).width()<=530)
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'98%','padding-bottom':'0px','height':'320px','border-radius':'0','top':'50%','left':'50%','opacity':'0','animation':'moveUpCP 0.65s ease forwards','-webkit-animation':'moveUpCP 0.65s ease forwards','-moz-animation':'moveUpCP 0.65s ease forwards'});
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'47%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'62%',});
										}
										else
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'450px','padding-bottom':'0px','height':'400px','border-radius':'0','top':'50%','left':'50%','max-height':'98%','max-width':'98%','opacity':'0','animation':'moveUpCP 0.65s ease forwards','-webkit-animation':'moveUpCP 0.65s ease forwards','-moz-animation':'moveUpCP 0.65s ease forwards'});
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'55%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'68%'});
										}
									}
								}
								else
								{
									if(b[2]){ jQuery('.frsp<?php echo $Total_Soft_Gallery_Video;?> a').attr('href',b[2]); }

									jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'height':'100%','opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});

									jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'top':'50%','left':'50%',});

									if(jQuery(window).width()>1000)
									{
										jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'1000px','padding-bottom':'500px','border-radius':'0','top':'50%','left':'50%','opacity':'0','animation':'scaleUpCP 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCP 0.65s ease-in-out forwards','-moz-animation':'scaleUpCP 0.65s ease-in-out forwards'});
									}
									else
									{
										if(jQuery(window).width()<=530)
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'98%','padding-bottom':'0px','height':'320px','border-radius':'0','top':'50%','left':'50%','opacity':'0','animation':'scaleUpCP 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCP 0.65s ease-in-out forwards','-moz-animation':'scaleUpCP 0.65s ease-in-out forwards'});
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'47%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'62%',});
										}
										else
										{
											jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'450px','padding-bottom':'0px','height':'400px','border-radius':'0','top':'50%','left':'50%','max-height':'98%','max-width':'98%','opacity':'0','animation':'scaleUpCP 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCP 0.65s ease-in-out forwards','-moz-animation':'scaleUpCP 0.65s ease-in-out forwards'});
											jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'55%'});
											jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100px','top':'68%'});
										}
									}
								}
								setTimeout(function(){
									jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
								},1500)
							}
						});
					}
					function TotalSoft_GV_CP_Close_Popup<?php echo $Total_Soft_Gallery_Video;?>()
					{
						var TotalSoft_GV_CP_PoM = jQuery('#TotalSoft_GV_CP_PoM_<?php echo $Total_Soft_Gallery_Video;?>').val();
						if(TotalSoft_GV_CP_PoM == '')
						{
							jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)',});
							jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
							jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
							jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
							jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
							jQuery('.TotalSoft_GV_CP_Pop_Icons_1<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft').css({'transform':'translate(0, -1200px)','-ms-transform': 'translate(0, -1200px)', '-o-transform': 'translate(0, -1200px)','-moz-transform': 'translate(0, -1200px)','-webkit-transform': 'translate(0, -1200px)'});
							jQuery('.TotalSoft_GV_CP_Pop_Icons_2<?php echo $Total_Soft_Gallery_Video;?> i.totalsoft').css({'transform':'translate(0, -1200px)','-ms-transform': 'translate(0, -1200px)', '-o-transform': 'translate(0, -1200px)','-moz-transform': 'translate(0, -1200px)','-webkit-transform': 'translate(0, -1200px)'});
							setTimeout(function(){
								if(jQuery(window).width()<=700)
								{
									jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'width':'50px','height':'50px','border-radius':'100%','top':'50%','left':'50%',},500);
								}
								else
								{
									jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'width':'50px','padding-bottom':'50px','border-radius':'100%','top':'50%','left':'50%',},500);
								}
								jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').animate({'top':'-50%','left':'-50%',},300);
								jQuery('.TotalSoft_GV_CP_Pop_Icons<?php echo $Total_Soft_Gallery_Video;?>').animate({'height':'0px',},500);
								jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src','');
							},300)
							setTimeout(function(){ jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').animate({'height':'0%',},300); },800)
						}
						else if(TotalSoft_GV_CP_PoM == 'mode01')
						{
							jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src','');

							jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});

							jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
							setTimeout(function(){
								jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'height':'0%'});
								jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'top':'-45%','left':'-45%'});
							},800)
						}
						else if(TotalSoft_GV_CP_PoM == 'mode02')
						{
							jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src','');

							jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});

							jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'moveUpCPC 0.65s ease forwards','-webkit-animation':'moveUpCPC 0.65s ease forwards','-moz-animation':'moveUpCPC 0.65s ease forwards'});
							setTimeout(function(){
								jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'height':'0%'});
								jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'top':'-45%','left':'-45%'});
							},800)
						}
						else
						{
							jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src','');

							jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});

							jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'scaleUpCPC 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPC 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPC 0.65s ease-in-out forwards'});
							setTimeout(function(){
								jQuery('.TotalSoft_GV_CP_Content<?php echo $Total_Soft_Gallery_Video;?>').css({'height':'0%'});
								jQuery('.TotalSoft_GV_CP_Popup<?php echo $Total_Soft_Gallery_Video;?>').css({'top':'-45%','left':'-45%'});
							},800)
						}
					}
					function TotalSoft_GV_CP_Left<?php echo $Total_Soft_Gallery_Video;?>(TotalSoftGV_CP_ID)
					{
						var TotalSoft_GV_CP_VID=jQuery('#TotalSoft_GV_CP_VID_'+TotalSoftGV_CP_ID).val();
						var TotalSoft_GV_CP_PoM = jQuery('#TotalSoft_GV_CP_PoM_'+TotalSoftGV_CP_ID).val();

						jQuery.ajax({
							type: 'POST',
							url: object.ajaxurl,
							data: {
								action: 'TotalSoftGallery_Video_CP_Popup_Left', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
								foobar: TotalSoft_GV_CP_VID, // translates into $_POST['foobar'] in PHP
							},
							beforeSend: function(){
								jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','block');
								if(TotalSoft_GV_CP_PoM == '')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode01')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode02')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'moveUpCPNU 0.65s ease forwards','-webkit-animation':'moveUpCPNU 0.65s ease forwards','-moz-animation':'moveUpCPNU 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'moveUpCPNU 0.65s ease forwards','-webkit-animation':'moveUpCPNU 0.65s ease forwards','-moz-animation':'moveUpCPNU 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'moveUpCPNU 0.65s ease forwards','-webkit-animation':'moveUpCPNU 0.65s ease forwards','-moz-animation':'moveUpCPNU 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'moveUpCPNU 0.65s ease forwards','-webkit-animation':'moveUpCPNU 0.65s ease forwards','-moz-animation':'moveUpCPNU 0.65s ease forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode03')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'scaleUpCPNU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPNU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPNU 0.65s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'scaleUpCPNU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPNU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPNU 0.65s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'scaleUpCPNU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPNU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPNU 0.65s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'scaleUpCPNU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPNU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPNU 0.65s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode04')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode05')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flyCPPU 0.8s ease-in-out forwards','-webkit-animation':'flyCPPU 0.8s ease-in-out forwards','-moz-animation':'flyCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flyCPPU 0.8s ease-in-out forwards','-webkit-animation':'flyCPPU 0.8s ease-in-out forwards','-moz-animation':'flyCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flyCPPU 0.8s ease-in-out forwards','-webkit-animation':'flyCPPU 0.8s ease-in-out forwards','-moz-animation':'flyCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flyCPPU 0.8s ease-in-out forwards','-webkit-animation':'flyCPPU 0.8s ease-in-out forwards','-moz-animation':'flyCPPU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode06')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flipCPPU 0.8s ease-in-out forwards','-webkit-animation':'flipCPPU 0.8s ease-in-out forwards','-moz-animation':'flipCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flipCPPU 0.8s ease-in-out forwards','-webkit-animation':'flipCPPU 0.8s ease-in-out forwards','-moz-animation':'flipCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flipCPPU 0.8s ease-in-out forwards','-webkit-animation':'flipCPPU 0.8s ease-in-out forwards','-moz-animation':'flipCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flipCPPU 0.8s ease-in-out forwards','-webkit-animation':'flipCPPU 0.8s ease-in-out forwards','-moz-animation':'flipCPPU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode07')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'helixCPPU 0.8s ease-in-out forwards','-webkit-animation':'helixCPPU 0.8s ease-in-out forwards','-moz-animation':'helixCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'helixCPPU 0.8s ease-in-out forwards','-webkit-animation':'helixCPPU 0.8s ease-in-out forwards','-moz-animation':'helixCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'helixCPPU 0.8s ease-in-out forwards','-webkit-animation':'helixCPPU 0.8s ease-in-out forwards','-moz-animation':'helixCPPU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'helixCPPU 0.8s ease-in-out forwards','-webkit-animation':'helixCPPU 0.8s ease-in-out forwards','-moz-animation':'helixCPPU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode08')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
								}
							},
							success: function(response){
								var b=Array();
								var a=response.split('=>');
								for(var i=1;i<a.length;i++)
								{ b[b.length]=a[i].split('[')[0].trim(); }
								b[b.length-1]=b[b.length-1].split(')')[0].trim();
								jQuery('#TotalSoft_GV_CP_VID_'+TotalSoftGV_CP_ID).val(b[0]);

								if(TotalSoft_GV_CP_PoM == '')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_Icons<?php echo $Total_Soft_Gallery_Video;?>').animate({'height':'40px',},500);
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode01')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);
									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode02')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'moveUpCPND 0.65s ease forwards','-webkit-animation':'moveUpCPND 0.65s ease forwards','-moz-animation':'moveUpCPND 0.65s ease forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'moveUpCPND 0.65s ease forwards','-webkit-animation':'moveUpCPND 0.65s ease forwards','-moz-animation':'moveUpCPND 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'moveUpCPND 0.65s ease forwards','-webkit-animation':'moveUpCPND 0.65s ease forwards','-moz-animation':'moveUpCPND 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'moveUpCPND 0.65s ease forwards','-webkit-animation':'moveUpCPND 0.65s ease forwards','-moz-animation':'moveUpCPND 0.65s ease forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode03')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'scaleUpCPND 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPND 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPND 0.65s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'scaleUpCPND 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPND 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPND 0.65s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'scaleUpCPND 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPND 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPND 0.65s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'scaleUpCPND 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPND 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPND 0.65s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode04')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPPD 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode05')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flyCPPD 0.8s ease-in-out forwards','-webkit-animation':'flyCPPD 0.8s ease-in-out forwards','-moz-animation':'flyCPPD 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flyCPPD 0.8s ease-in-out forwards','-webkit-animation':'flyCPPD 0.8s ease-in-out forwards','-moz-animation':'flyCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flyCPPD 0.8s ease-in-out forwards','-webkit-animation':'flyCPPD 0.8s ease-in-out forwards','-moz-animation':'flyCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flyCPPD 0.8s ease-in-out forwards','-webkit-animation':'flyCPPD 0.8s ease-in-out forwards','-moz-animation':'flyCPPD 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode06')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flipCPPD 0.8s ease-in-out forwards','-webkit-animation':'flipCPPD 0.8s ease-in-out forwards','-moz-animation':'flipCPPD 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flipCPPD 0.8s ease-in-out forwards','-webkit-animation':'flipCPPD 0.8s ease-in-out forwards','-moz-animation':'flipCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flipCPPD 0.8s ease-in-out forwards','-webkit-animation':'flipCPPD 0.8s ease-in-out forwards','-moz-animation':'flipCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flipCPPD 0.8s ease-in-out forwards','-webkit-animation':'flipCPPD 0.8s ease-in-out forwards','-moz-animation':'flipCPPD 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode07')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'helixCPPD 0.8s ease-in-out forwards','-webkit-animation':'helixCPPD 0.8s ease-in-out forwards','-moz-animation':'helixCPPD 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'helixCPPD 0.8s ease-in-out forwards','-webkit-animation':'helixCPPD 0.8s ease-in-out forwards','-moz-animation':'helixCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'helixCPPD 0.8s ease-in-out forwards','-webkit-animation':'helixCPPD 0.8s ease-in-out forwards','-moz-animation':'helixCPPD 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'helixCPPD 0.8s ease-in-out forwards','-webkit-animation':'helixCPPD 0.8s ease-in-out forwards','-moz-animation':'helixCPPD 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode08')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
							}
						});
					}
					function TotalSoft_GV_CP_Right<?php echo $Total_Soft_Gallery_Video;?>(TotalSoftGV_CP_ID)
					{

						var TotalSoft_GV_CP_VID=jQuery('#TotalSoft_GV_CP_VID_'+TotalSoftGV_CP_ID).val();
						var TotalSoft_GV_CP_PoM = jQuery('#TotalSoft_GV_CP_PoM_'+TotalSoftGV_CP_ID).val();

						jQuery.ajax({
							type: 'POST',
							url: object.ajaxurl,
							data: {
								action: 'TotalSoftGallery_Video_CP_Popup_Right', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
								foobar: TotalSoft_GV_CP_VID, // translates into $_POST['foobar'] in PHP
							},
							beforeSend: function(){
								jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','block');
								if(TotalSoft_GV_CP_PoM == '')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode01')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'opacity':'1','animation':'fadeOut 0.65s ease forwards','-webkit-animation':'fadeOut 0.65s ease forwards','-moz-animation':'fadeOut 0.65s ease forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode02')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'moveUpCPPU 0.65s ease forwards','-webkit-animation':'moveUpCPPU 0.65s ease forwards','-moz-animation':'moveUpCPPU 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'moveUpCPPU 0.65s ease forwards','-webkit-animation':'moveUpCPPU 0.65s ease forwards','-moz-animation':'moveUpCPPU 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'moveUpCPPU 0.65s ease forwards','-webkit-animation':'moveUpCPPU 0.65s ease forwards','-moz-animation':'moveUpCPPU 0.65s ease forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'moveUpCPPU 0.65s ease forwards','-webkit-animation':'moveUpCPPU 0.65s ease forwards','-moz-animation':'moveUpCPPU 0.65s ease forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode03')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'scaleUpCPPU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPU 0.65s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'scaleUpCPPU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPU 0.65s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'scaleUpCPPU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPU 0.65s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'scaleUpCPPU 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPU 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPU 0.65s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode04')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPNU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode05')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flyCPNU 0.8s ease-in-out forwards','-webkit-animation':'flyCPNU 0.8s ease-in-out forwards','-moz-animation':'flyCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flyCPNU 0.8s ease-in-out forwards','-webkit-animation':'flyCPNU 0.8s ease-in-out forwards','-moz-animation':'flyCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flyCPNU 0.8s ease-in-out forwards','-webkit-animation':'flyCPNU 0.8s ease-in-out forwards','-moz-animation':'flyCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flyCPNU 0.8s ease-in-out forwards','-webkit-animation':'flyCPNU 0.8s ease-in-out forwards','-moz-animation':'flyCPNU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode06')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flipCPNU 0.8s ease-in-out forwards','-webkit-animation':'flipCPNU 0.8s ease-in-out forwards','-moz-animation':'flipCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flipCPNU 0.8s ease-in-out forwards','-webkit-animation':'flipCPNU 0.8s ease-in-out forwards','-moz-animation':'flipCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flipCPNU 0.8s ease-in-out forwards','-webkit-animation':'flipCPNU 0.8s ease-in-out forwards','-moz-animation':'flipCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flipCPNU 0.8s ease-in-out forwards','-webkit-animation':'flipCPNU 0.8s ease-in-out forwards','-moz-animation':'flipCPNU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode07')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'helixCPNU 0.8s ease-in-out forwards','-webkit-animation':'helixCPNU 0.8s ease-in-out forwards','-moz-animation':'helixCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'helixCPNU 0.8s ease-in-out forwards','-webkit-animation':'helixCPNU 0.8s ease-in-out forwards','-moz-animation':'helixCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'helixCPNU 0.8s ease-in-out forwards','-webkit-animation':'helixCPNU 0.8s ease-in-out forwards','-moz-animation':'helixCPNU 0.8s ease-in-out forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'helixCPNU 0.8s ease-in-out forwards','-webkit-animation':'helixCPNU 0.8s ease-in-out forwards','-moz-animation':'helixCPNU 0.8s ease-in-out forwards'});
								}
								else if(TotalSoft_GV_CP_PoM == 'mode08')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'popUpCPPU 0.8s ease-in forwards','-webkit-animation':'popUpCPPU 0.8s ease-in forwards','-moz-animation':'popUpCPPU 0.8s ease-in forwards'});
								}
							},
							success: function(response){
								var b=Array();
								var a=response.split('=>');
								for(var i=1;i<a.length;i++)
								{ b[b.length]=a[i].split('[')[0].trim(); }
								b[b.length-1]=b[b.length-1].split(')')[0].trim();
								jQuery('#TotalSoft_GV_CP_VID_'+TotalSoftGV_CP_ID).val(b[0]);

								if(TotalSoft_GV_CP_PoM == '')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_Icons<?php echo $Total_Soft_Gallery_Video;?>').animate({'height':'40px',},500);
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode01')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);
									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'opacity':'0','animation':'fadeIn 0.65s ease forwards','-webkit-animation':'fadeIn 0.65s ease forwards','-moz-animation':'fadeIn 0.65s ease forwards'});
										},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode02')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'moveUpCPPD 0.65s ease forwards','-webkit-animation':'moveUpCPPD 0.65s ease forwards','-moz-animation':'moveUpCPPD 0.65s ease forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'moveUpCPPD 0.65s ease forwards','-webkit-animation':'moveUpCPPD 0.65s ease forwards','-moz-animation':'moveUpCPPD 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'moveUpCPPD 0.65s ease forwards','-webkit-animation':'moveUpCPPD 0.65s ease forwards','-moz-animation':'moveUpCPPD 0.65s ease forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'moveUpCPPD 0.65s ease forwards','-webkit-animation':'moveUpCPPD 0.65s ease forwards','-moz-animation':'moveUpCPPD 0.65s ease forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode03')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'scaleUpCPPD 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPD 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPD 0.65s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'scaleUpCPPD 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPD 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPD 0.65s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'scaleUpCPPD 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPD 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPD 0.65s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'scaleUpCPPD 0.65s ease-in-out forwards','-webkit-animation':'scaleUpCPPD 0.65s ease-in-out forwards','-moz-animation':'scaleUpCPPD 0.65s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode04')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-webkit-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards','-moz-animation':'fallPerspectiveCPND 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode05')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flyCPND 0.8s ease-in-out forwards','-webkit-animation':'flyCPND 0.8s ease-in-out forwards','-moz-animation':'flyCPND 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flyCPND 0.8s ease-in-out forwards','-webkit-animation':'flyCPND 0.8s ease-in-out forwards','-moz-animation':'flyCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flyCPND 0.8s ease-in-out forwards','-webkit-animation':'flyCPND 0.8s ease-in-out forwards','-moz-animation':'flyCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flyCPND 0.8s ease-in-out forwards','-webkit-animation':'flyCPND 0.8s ease-in-out forwards','-moz-animation':'flyCPND 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode06')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'flipCPND 0.8s ease-in-out forwards','-webkit-animation':'flipCPND 0.8s ease-in-out forwards','-moz-animation':'flipCPND 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'flipCPND 0.8s ease-in-out forwards','-webkit-animation':'flipCPND 0.8s ease-in-out forwards','-moz-animation':'flipCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'flipCPND 0.8s ease-in-out forwards','-webkit-animation':'flipCPND 0.8s ease-in-out forwards','-moz-animation':'flipCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'flipCPND 0.8s ease-in-out forwards','-webkit-animation':'flipCPND 0.8s ease-in-out forwards','-moz-animation':'flipCPND 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode07')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'helixCPND 0.8s ease-in-out forwards','-webkit-animation':'helixCPND 0.8s ease-in-out forwards','-moz-animation':'helixCPND 0.8s ease-in-out forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'helixCPND 0.8s ease-in-out forwards','-webkit-animation':'helixCPND 0.8s ease-in-out forwards','-moz-animation':'helixCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'helixCPND 0.8s ease-in-out forwards','-webkit-animation':'helixCPND 0.8s ease-in-out forwards','-moz-animation':'helixCPND 0.8s ease-in-out forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'helixCPND 0.8s ease-in-out forwards','-webkit-animation':'helixCPND 0.8s ease-in-out forwards','-moz-animation':'helixCPND 0.8s ease-in-out forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
								else if(TotalSoft_GV_CP_PoM == 'mode08')
								{
									jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?> iframe').attr('src',b[5]+'?rel=0;iv_load_policy=3');
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').html(b[1]);
									jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').html(b[2]);

									setTimeout(function(){
										if(b[3])
										{
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3 a').attr('href',b[3]);
											jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h3').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
										}
										jQuery('.TotalSoft_GV_CP_Iframe<?php echo $Total_Soft_Gallery_Video;?>').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
										jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> p').css({'animation':'popUpCPPD 0.8s ease-in forwards','-webkit-animation':'popUpCPPD 0.8s ease-in forwards','-moz-animation':'popUpCPPD 0.8s ease-in forwards'});
									},500)
									setTimeout(function(){
										jQuery('.TotalSoft_GV_CP_Pop_load_'+TotalSoftGV_CP_ID).css('display','none');
									},1000)
								}
							}
						});
					}
				</script>
				<script>
					jQuery(document).ready(function(){
						var CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>').val();
						var CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>').val();
						var CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?>').val();
						var CPFontSizeVideoTitlePopup<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.CPFontSizeVideoTitlePopup<?php echo $Total_Soft_Gallery_Video;?>').val();
						var CPFontSizeVideoLinkPopup<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.CPFontSizeVideoLinkPopup<?php echo $Total_Soft_Gallery_Video;?>').val();
						function resp<?php echo $Total_Soft_Gallery_Video;?>()
						{
							jQuery('.TotalSoft_GV_CP_TD<?php echo $Total_Soft_Gallery_Video;?> h2').css('font-size',Math.floor(CPFontSizeVideoTitlePopup<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/(jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()+150)));
							jQuery('.popDescr<?php echo $Total_Soft_Gallery_Video;?>').css('font-size',Math.floor(jQuery('.popDescr<?php echo $Total_Soft_Gallery_Video;?>').css('font-size')*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/(jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()+150)));
							jQuery('.fResp<?php echo $Total_Soft_Gallery_Video;?> h3 a').css('font-size',Math.floor(CPFontSizeVideoLinkPopup<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/(jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()+150)));
							if(jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()<=300)
							{
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100%'});
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask').css({'width':'100%','height':'100%'});
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100%'});
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> h2').css('font-size',Math.floor(CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/300));
							}
							else if(jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()<=700)
							{
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100%'});
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask').css({'width':'100%','height':'100%'});
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?>').css({'width':'100%','height':'100%'});
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> h2').css('font-size',Math.floor(CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/700));
							}
							else if(jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()<=1000)
							{
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').css('width',Math.floor(CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').css('height',Math.floor(CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask').css('width',Math.floor(CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask').css('height',Math.floor(CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?>').css('width',Math.floor(CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?>').css('height',Math.floor(CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> h2').css('font-size',Math.floor(CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1000));
							}
							else
							{
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').css('width',Math.floor(CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').css('height',Math.floor(CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask').css('width',Math.floor(CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .mask').css('height',Math.floor(CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?>').css('width',Math.floor(CPWIDTHVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> .content<?php echo $Total_Soft_Gallery_Video;?>').css('height',Math.floor(CPHeightVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
								jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?> h2').css('font-size',Math.floor(CPFontSizeVideo<?php echo $Total_Soft_Gallery_Video;?>*jQuery('.totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').parent().width()/1200));
							}
						}
						setTimeout(function(){ resp<?php echo $Total_Soft_Gallery_Video;?>(); },1000)
						resp<?php echo $Total_Soft_Gallery_Video;?>();
						jQuery(window).resize(function(){ resp<?php echo $Total_Soft_Gallery_Video;?>(); })
						var delaytime = 0;
						var TS_VG_CP_AE = jQuery('.TS_VG_CP_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.TotalSoft_GV_CP_Main<?php echo $Total_Soft_Gallery_Video;?> .totalsoftview<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_CP_AE == '')
								{
									jQuery(this).css({'display':'inline-block','opacity':'1'});
								}
								else if(TS_VG_CP_AE == 'fadeIn')
								{
									jQuery(this).css({'display':'inline-block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'moveUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'scaleUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'fallPerspective')
								{
									jQuery(this).css({'display':'inline-block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'fly')
								{
									jQuery(this).css({'display':'inline-block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'flip')
								{
									jQuery(this).css({'display':'inline-block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'helix')
								{
									jQuery(this).css({'display':'inline-block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CP_AE == 'popUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Elastic Gallery') { ?>
				<link href="<?php echo plugins_url('../CSS/lightgallery.css',__FILE__);?>" rel="stylesheet">
				<style type="text/css">
					.pagination<?php echo $Total_Soft_Gallery_Video;?> { perspective:800px !important; }
					.lg-backdrop<?php echo $Total_Soft_Gallery_Video;?> 
					{
						position: fixed;
						top: 0;
						left: 0;
						right: 0;
						bottom: 0;
						z-index: 1040;
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>;
						opacity: 0;
						-webkit-transition: opacity 0.15s ease 0s;
						-moz-transition: opacity 0.15s ease 0s;
						-o-transition: opacity 0.15s ease 0s;
						transition: opacity 0.15s ease 0s;
					}
					#lg-counter<?php echo $Total_Soft_Gallery_Video;?> 
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						display: inline-block;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31*2/3;?>px;
						padding-left: 20px;
						padding-top: 12px;
						vertical-align: middle;
					}
					.lg-toolbar<?php echo $Total_Soft_Gallery_Video;?> .lg-icon<?php echo $Total_Soft_Gallery_Video;?> 
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						cursor: pointer;
						float: right;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>px;
						height: 47px;
						line-height: 27px;
						padding: 10px 0;
						text-align: center;
						width: 50px;
						text-decoration: none !important;
						outline: medium none;
						-webkit-transition: color 0.2s linear;
						-moz-transition: color 0.2s linear;
						-o-transition: color 0.2s linear;
						transition: color 0.2s linear;
					}
					.lg-iconn
					{
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						cursor: pointer;
						float: right;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>px;
						height: 47px;
						line-height: 27px;
						padding: 10px 0;
						text-align: center;
						width: 50px;
						text-decoration: none !important;
						outline: medium none;
						-webkit-transition: color 0.2s linear;
						-moz-transition: color 0.2s linear;
						-o-transition: color 0.2s linear;
						transition: color 0.2s linear;
					}
					.lg-toolbar<?php echo $Total_Soft_Gallery_Video;?> .lg-close<?php echo $Total_Soft_Gallery_Video;?>:after { display:none !important; }
					.lg-actions<?php echo $Total_Soft_Gallery_Video;?> .lg-next<?php echo $Total_Soft_Gallery_Video;?>, .lg-actions<?php echo $Total_Soft_Gallery_Video;?> .lg-prev<?php echo $Total_Soft_Gallery_Video;?> 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>;
						border-radius: 2px;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>;
						cursor: pointer;
						display: block;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>px;
						padding: 8px 10px 9px;
						position: absolute;
						top: 50%;
						transform:translateY(-50%) translate3d(0, 0, 0);
						-webkit-transform:translateY(-50%) translate3d(0, 0, 0);
						-ms-transform:translateY(-50%) translate3d(0, 0, 0);
						-moz-transform:translateY(-50%) translate3d(0, 0, 0);
						-o-transform:translateY(-50%) translate3d(0, 0, 0);
						perspective: 800px;
						z-index: 1080;
					}
					.lg-actions<?php echo $Total_Soft_Gallery_Video;?> .lg-prev<?php echo $Total_Soft_Gallery_Video;?>:after
					{
						display:none;
					}
					.lg-outer<?php echo $Total_Soft_Gallery_Video;?> .lg-video<?php echo $Total_Soft_Gallery_Video;?> 
					{
						width: 100%;
						height: 0;
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>;
						padding-bottom: 56.25%;
						overflow: hidden;
						position: relative;
						background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>;
					}
					.demo-gallery > ul { margin-bottom: 0; }
					.demo-gallery > ul > li { float: left; margin-bottom: 15px; margin-right: 20px; width: 200px; }
					.demo-gallery > ul > li a { border: 3px solid #FFF; border-radius: 3px; display: block; overflow: hidden; position: relative; float: left; }
					.demo-gallery > ul > li a > img 
					{
						-webkit-transition: -webkit-transform 0.15s ease 0s;
						-moz-transition: -moz-transform 0.15s ease 0s;
						-o-transition: -o-transform 0.15s ease 0s;
						transition: transform 0.15s ease 0s;
						-webkit-transform: scale3d(1, 1, 1);
						-moz-transform: scale3d(1, 1, 1);
						transform: scale3d(1, 1, 1);
						height: 100%;
						width: 100%;
					}
					.demo-gallery > ul > li a:hover > img 
					{
						-webkit-transform: scale3d(1.1, 1.1, 1.1);
						-moz-transform: scale3d(1.1, 1.1, 1.1);
						transform: scale3d(1.1, 1.1, 1.1);
					}
					.demo-gallery > ul > li a:hover .demo-gallery-poster > img { opacity: 1; }
					.demo-gallery > ul > li a .demo-gallery-poster 
					{
						background-color: rgba(0, 0, 0, 0.1);
						bottom: 0;
						left: 0;
						position: absolute;
						right: 0;
						top: 0;
						-webkit-transition: background-color 0.15s ease 0s;
						-moz-transition: background-color 0.15s ease 0s;
						-o-transition: background-color 0.15s ease 0s;
						transition: background-color 0.15s ease 0s;
					}
					.demo-gallery > ul > li a .demo-gallery-poster > img 
					{
						left: 50%;
						margin-left: -10px;
						margin-top: -10px;
						opacity: 0;
						position: absolute;
						top: 50%;
						-webkit-transition: opacity 0.3s ease 0s;
						-moz-transition: opacity 0.3s ease 0s;
						-o-transition: opacity 0.3s ease 0s;
						transition: opacity 0.3s ease 0s;
					}
					.demo-gallery > ul > li a:hover .demo-gallery-poster { background-color: rgba(0, 0, 0, 0.5); }
					.demo-gallery .justified-gallery > a > img 
					{
						-webkit-transition: -webkit-transform 0.15s ease 0s;
						-moz-transition: -moz-transform 0.15s ease 0s;
						-o-transition: -o-transform 0.15s ease 0s;
						transition: transform 0.15s ease 0s;
						-webkit-transform: scale3d(1, 1, 1);
						-moz-transform: scale3d(1, 1, 1);
						transform: scale3d(1, 1, 1);
						height: 100%;
						width: 100%;
					}
					.demo-gallery .justified-gallery > a:hover > img 
					{
						-webkit-transform: scale3d(1.1, 1.1, 1.1);
						-moz-transform: scale3d(1.1, 1.1, 1.1);
						transform: scale3d(1.1, 1.1, 1.1);
					}
					.demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img { opacity: 1; }
					.demo-gallery .justified-gallery > a .demo-gallery-poster 
					{
						background-color: rgba(0, 0, 0, 0.1);
						bottom: 0;
						left: 0;
						position: absolute;
						right: 0;
						top: 0;
						-webkit-transition: background-color 0.15s ease 0s;
						-moz-transition: background-color 0.15s ease 0s;
						-o-transition: background-color 0.15s ease 0s;
						transition: background-color 0.15s ease 0s;
					}
					.demo-gallery .justified-gallery > a .demo-gallery-poster > img 
					{
						left: 50%;
						margin-left: -10px;
						margin-top: -10px;
						opacity: 0;
						position: absolute;
						top: 50%;
						-webkit-transition: opacity 0.3s ease 0s;
						-moz-transition: opacity 0.3s ease 0s;
						-o-transition: opacity 0.3s ease 0s;
						transition: opacity 0.3s ease 0s;
					}
					.demo-gallery .justified-gallery > a:hover .demo-gallery-poster { background-color: rgba(0, 0, 0, 0.5); }
					.demo-gallery .video .demo-gallery-poster img { height: 48px; margin-left: -24px; margin-top: -24px; opacity: 0.8; width: 48px; }
					.demo-gallery.dark > ul > li a { border: 3px solid #04070a; }
					.home .demo-gallery { padding-bottom: 80px; }
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>
					{
						display:inline-block;
						position:relative;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05;?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>;
						margin:5px;
						overflow:hidden;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					.zEff1
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						height:125% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff1 { top:-25%; }
					.zEff2
					{
						position:absolute;
						top:-25%;
						left:0%;
						width:100%;
						height:125% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff2 { top:0%; }
					.zEff3
					{
						position:absolute;
						top:-15%;
						left:-15%;
						width:130%;
						height:130% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff3 { top:0%; left:0%; width:100%; height:100% !important; }
					.zEff4
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						height:100% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff4 { top:-15%; left:-15%; width:130%; height:130% !important; }
					.zEff5
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						height:100% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff5 { width:130%; height:130% !important; }
					.zEff6
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						height:100% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff6 { width:130%; height:130% !important; top:-30%; }
					.zEff7
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						height:100% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff7 { width:130%; height:130% !important; left:-30%; }
					.zEff8
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						height:100% !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09/10;?>s linear !important;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zEff8 { width:130%; height:130% !important; left:-30%; top:-30%; }
					.zEff9 { position:absolute; top:0%; left:0%; width:100%; height:100% !important; }
					.zTitfHov1
					{
						position:absolute;
						bottom:0%;
						left:0%;
						width:100%;
						padding-top:5px;
						padding-bottom:5px;
						text-align:left;
						background:#000;
						color:#fff;
						transform:translateY(100%) !important;
						-webkit-transform:translateY(100%) !important;
						-moz-transform:translateY(100%) !important;
						-ms-transform:translateY(100%) !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zTitfHov1
					{
						transform:translateY(0%) !important;
						-webkit-transform:translateY(0%) !important;
						-moz-transform:translateY(0%) !important;
						-ms-transform:translateY(0%) !important;
					}
					.zTitfHov2
					{
						position:absolute;
						top:0%;
						left:0%;
						width:100%;
						padding-top:5px;
						padding-bottom:5px;
						text-align:left;
						background:#000;
						color:#fff;
						transform:translateY(-100%) !important;
						-webkit-transform:translateY(-100%) !important;
						-moz-transform:translateY(-100%) !important;
						-ms-transform:translateY(-100%) !important;
						transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
						-webkit-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
						-moz-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
						-ms-transition:all <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15/10;?>s linear;
					}
					.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>:hover .zTitfHov2
					{
						transform:translateY(0%) !important;
						-webkit-transform:translateY(0%) !important;
						-moz-transform:translateY(0%) !important;
						-ms-transform:translateY(0%) !important;
					}
					.zTitfHov3 { position:absolute; top:0%; left:0%; width:100%; padding-top:5px; padding-bottom:5px; text-align:left; background:#000; color:#fff; }
					.zTitfHov4 { position:absolute; bottom:0%; left:0%; width:100%; padding-top:5px; padding-bottom:5px; text-align:left; background:#000; color:#fff; }
					.TotalsofthPIcon1
					{
						float:right;
						padding:5px;
						margin-right:5px;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px;
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>;
						border-radius:50%;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>;
					}
					.TotalsofthLIcon1<?php echo $Total_Soft_Gallery_Video;?>
					{
						float:right;
						padding:5px;
						margin-right:5px;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px;
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						border-radius:50%;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?>;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li { border:none !important; list-style:none !important; padding-left:0px !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span 
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
						height:auto !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						display: block !important;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span:hover:not(.active) 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span.active 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
					}
					.TotalSoftGV_HLG_LM<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.TotalSoftGV_HLG_LM<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>;
					}
					@media screen and (max-width:820px)
					{
						.zEff, .pagination li span { cursor:default; }
						.lg-actions<?php echo $Total_Soft_Gallery_Video;?> .lg-prev<?php echo $Total_Soft_Gallery_Video;?>, .lg-actions<?php echo $Total_Soft_Gallery_Video;?> .lg-next<?php echo $Total_Soft_Gallery_Video;?> { font-size: 15px; }
						.lg-outer<?php echo $Total_Soft_Gallery_Video;?> .lg-video<?php echo $Total_Soft_Gallery_Video;?> { width: 100%; height: 100%; left: 0; top: 0; padding-bottom: 0%; position: absolute; }
						.fhovZoom<?php echo $Total_Soft_Gallery_Video;?> { margin: 5px 0; }
					}
					@media screen and (max-width:400px)
					{
						.lg-outer<?php echo $Total_Soft_Gallery_Video;?> .lg-video<?php echo $Total_Soft_Gallery_Video;?> { width: 100%; height: 0; padding-bottom: 56.25%; position: relative; }
					}
					.Tot_Vid_Gallery<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
				</style>
				<div id="video-gallery" class='Tot_Vid_Gallery<?php echo $Total_Soft_Gallery_Video;?>' style='text-align:center;'>
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
						<div id="TotalSoft_GV_HLG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class='fhovZoom<?php echo $Total_Soft_Gallery_Video;?>' href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" data-poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" onclick='TotalsofthPIcon()'>
							<a href='#'>
								<img class='zEff <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>' style='max-width:none;' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
								<div class='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>' style='background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>;'> 
									<span style='margin-left:5px;font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>px; color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>; font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>; display:<?php echo $TotalSoft_GV_1_16;?>'>
										<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
									</span>
									<i onclick='TotalsofthPIcon()' class='TotalsofthPIcon1 <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>' ></i>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!=''){ ?>
										<i onclick="TotalsoftLink<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>',<?php echo $i+1; ?>)" name='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT;?>'  class='Tot_<?php echo $i+1; ?> TotalsofthLIcon1<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>'></i>
									<?php } ?>
								</div> 
							</a>
						</div>
						<?php }else{ ?>
							<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
								<div id="TotalSoft_GV_HLG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class='fhovZoom<?php echo $Total_Soft_Gallery_Video;?>' href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" data-poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" onclick='TotalsofthPIcon()'>
									<a href='#'>
										<img class='zEff <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>' style='max-width:none;' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<div class='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>' style='background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>;'> 
											<span style='margin-left:5px;font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>px; color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>; font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;display:<?php echo $TotalSoft_GV_1_16;?>'>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											</span>
											<i onclick='TotalsofthPIcon()' class='TotalsofthPIcon1 <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>' ></i>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!=''){ ?>
												<i onclick="TotalsoftLink<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>',<?php echo $i+1; ?>)" name='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT;?>'  class='Tot_<?php echo $i+1; ?> TotalsofthLIcon1<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>'></i>
											<?php } ?>
										</div> 
									</a>
								</div>
							<?php }else{ ?>
								<div style='display:none;' id="TotalSoft_GV_HLG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class='fhovZoom<?php echo $Total_Soft_Gallery_Video;?> noshow1' href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" data-poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" onclick='TotalsofthPIcon()'>
									<a href='#'>
										<img class='zEff <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>' style='max-width:none;' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<div class='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>' style='background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>;'> 
											<span style='margin-left:5px; font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>px; color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>; font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>; display:<?php echo $TotalSoft_GV_1_16;?>'>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											</span>
											<i onclick='TotalsofthPIcon()' class='TotalsofthPIcon1 <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?>' ></i>
											<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink!=''){ ?>
												<i onclick="TotalsoftLink<?php echo $Total_Soft_Gallery_Video;?>('<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>',<?php echo $i+1; ?>)" name='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT;?>'  class='Tot_<?php echo $i+1; ?> TotalsofthLIcon1<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>'></i>
											<?php } ?>
										</div> 
									</a>
								</div>
					<?php } } }?>
				</div>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
					<div class="TotalSoftcenter">
						<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video;?>">
							<li onclick="Total_Soft_GV_HLG_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?></span></li>
							<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
								<?php if($i==1){ ?>
									<li id="TotalSoft_GV_HLG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_HLG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active"><?php echo $i;?></span></li>
								<?php } else { ?>
									<li id="TotalSoft_GV_HLG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_HLG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
								<?php }?>
							<?php }?>
							<li onclick="Total_Soft_GV_HLG_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?></span></li>
						</ul>
					</div>
				<?php }?>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
					<div class="TotalSoftcenter" id="TotalSoft_VG_HLG_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
						<span class="TotalSoftGV_HLG_LM TotalSoftGV_HLG_LM<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_HLG_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
						<input type="text" style="display:none;" id="TotalSoft_VG_HLG_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
					</div>
				<?php } ?>
				<input type='text' style='display:none;' class='iagesCountNumb' value='<?php count($Total_Soft_GalleryV_Videos); ?>' >
				<input type='text' style='display:none;' class='Totalsoft_SlDuration<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>' >
				<input type='text' style='display:none;' class='Totalsoft_SlDelIcType<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>' >
				<input type='text' style='display:none;' class='Totalsoft_SlIcLeftType<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoft_GV_1_36_Left;?>' >
				<input type='text' style='display:none;' class='Totalsoft_SlIcRightType<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoft_GV_1_36_Right;?>' >
				<input type='text' style='display:none;' class='Totalsoft_Autoplay' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?>' >
				<input type='text' style='display:none;' class='Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?>' >
				<input type='text' style='display:none;' class='TS_VG_EG_AE_<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>' >
				<script type="text/javascript">
					var cssWidtTot<?php echo $Total_Soft_Gallery_Video;?>=<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>;
					var cssHeightTot<?php echo $Total_Soft_Gallery_Video;?>=<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>;
					function resp<?php echo $Total_Soft_Gallery_Video;?>(){
						if(jQuery('.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').parent().width()<=jQuery('.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').width())
						{
							jQuery('.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').css('width',jQuery('.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').parent().width());
							jQuery('.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').css('height',Math.floor(jQuery('.fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').parent().width()*cssHeightTot<?php echo $Total_Soft_Gallery_Video;?>/cssWidtTot<?php echo $Total_Soft_Gallery_Video;?>));
						}
					}
					resp<?php echo $Total_Soft_Gallery_Video;?>();
					jQuery(window).resize(function(){ resp<?php echo $Total_Soft_Gallery_Video;?>(); })
					jQuery(document).ready(function(){
						jQuery('.Tot_Vid_Gallery<?php echo $Total_Soft_Gallery_Video;?>').lightGallery<?php echo $Total_Soft_Gallery_Video;?>();
						var delaytime = 0;
						var TS_VG_EG_AE = jQuery('.TS_VG_EG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.Tot_Vid_Gallery<?php echo $Total_Soft_Gallery_Video;?> .fhovZoom<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_EG_AE == '')
								{
									jQuery(this).css({'display':'inline-block','opacity':'1'});
								}
								else if(TS_VG_EG_AE == 'fadeIn')
								{
									jQuery(this).css({'display':'inline-block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'moveUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'scaleUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'fallPerspective')
								{
									jQuery(this).css({'display':'inline-block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'fly')
								{
									jQuery(this).css({'display':'inline-block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'flip')
								{
									jQuery(this).css({'display':'inline-block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'helix')
								{
									jQuery(this).css({'display':'inline-block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_EG_AE == 'popUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					});
					function TotalsoftLink<?php echo $Total_Soft_Gallery_Video;?>(link,number)
					{
						for(number==1;number<=<?php echo count($Total_Soft_GalleryV_Videos); ?>;number++)
						{
							if(jQuery('.Tot_'+number).attr('name')=='true') { window.open(link); break; } else { window.location.assign(link) }
						}
					}
					jQuery('.TotalsofthLIcon1<?php echo $Total_Soft_Gallery_Video;?>').one('click',function(){ TotalsoftLink<?php echo $Total_Soft_Gallery_Video;?>(); })
				</script>
				<script type="text/javascript">
					var y=true;
					function TotalsofthPIcon() { y=false; }
					(function($, window, document, undefined) {
						var Totalsoft_SlDuration<?php echo $Total_Soft_Gallery_Video;?> = parseInt(jQuery('.Totalsoft_SlDuration<?php echo $Total_Soft_Gallery_Video;?>').val());
						var Totalsoft_SlDelIcType<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.Totalsoft_SlDelIcType<?php echo $Total_Soft_Gallery_Video;?>').val();
						var Totalsoft_SlIcLeftType<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.Totalsoft_SlIcLeftType<?php echo $Total_Soft_Gallery_Video;?>').val();
						var Totalsoft_SlIcRightType<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.Totalsoft_SlIcRightType<?php echo $Total_Soft_Gallery_Video;?>').val();
						var Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?>').val();
						if(Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?>=='true') { Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?>=true; }
						else { Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?>=false; }
						'use strict';
						var defaults = {
							mode: 'lg-slide',
							cssEasing: 'ease',
							easing: 'linear',
							speed: Totalsoft_SlDuration<?php echo $Total_Soft_Gallery_Video;?>*100,
							height: '100%',
							width: '100%',
							addClass: '',
							startClass: 'lg-start-zoom',
							backdropDuration: 150,
							hideBarsDelay: 6000,
							useLeft: false,
							closable: true,
							loop: Totalsoft_Loop<?php echo $Total_Soft_Gallery_Video;?>,
							escKey: true,
							keyPress: true,
							controls: true,
							slideEndAnimatoin: true,
							hideControlOnEnd: false,
							mousewheel: true,
							getCaptionFromTitleOrAlt: true,
							appendSubHtmlTo: '.lg-sub-html',
							subHtmlSelectorRelative: false,
							preload: 1,
							showAfterLoad: true,
							selector: '',
							selectWithin: '',
							nextHtml: '',
							prevHtml: '',
							index: false,
							iframeMaxWidth: '100%',
							download: true,
							counter: true,
							appendCounterTo: '.lg-toolbar<?php echo $Total_Soft_Gallery_Video;?>',
							swipeThreshold: 50,
							enableSwipe: true,
							enableDrag: true,
							dynamic: false,
							dynamicEl: [],
							galleryId: 1
						};
						function Plugin(element, options) {
							this.el = element;
							this.$el = $(element);
							this.s = $.extend({}, defaults, options);
							if (this.s.dynamic && this.s.dynamicEl !== 'undefined' && this.s.dynamicEl.constructor === Array && !this.s.dynamicEl.length) 
							{
								throw ('When using dynamic mode, you must also define dynamicEl as an Array.');
							}
							this.modules = {};
							this.lGalleryOn = false;
							this.lgBusy = false;
							this.hideBartimeout = false;
							this.isTouch = ('ontouchstart' in document.documentElement);
							if (this.s.slideEndAnimatoin) { this.s.hideControlOnEnd = false; }
							if (this.s.dynamic) { this.$items = this.s.dynamicEl; } 
							else 
							{
								if (this.s.selector === 'this') { this.$items = this.$el; } 
								else if (this.s.selector !== '') 
								{
									if (this.s.selectWithin) { this.$items = $(this.s.selectWithin).find(this.s.selector); } 
									else { this.$items = this.$el.find($(this.s.selector)); }
								}
								else { this.$items = this.$el.children(); }
							}
							this.$slide = '';
							this.$outer = '';
							this.init();
							return this;
						}
						Plugin.prototype.init = function() {
							var _this = this;
							if (_this.s.preload > _this.$items.length) { _this.s.preload = _this.$items.length; }
							var _hash = window.location.hash;
							if (_hash.indexOf('lg=' + this.s.galleryId) > 0) 
							{
								_this.index = parseInt(_hash.split('&slide=')[1], 10);
								$('body').addClass('lg-from-hash');
								if (!$('body').hasClass('lg-on')) { setTimeout(function() { _this.build(_this.index); }); $('body').addClass('lg-on'); }
							}
							if (_this.s.dynamic) 
							{
								_this.$el.trigger('onBeforeOpen.lg');
								_this.index = _this.s.index || 0;
								if (!$('body').hasClass('lg-on')) { setTimeout(function() { _this.build(_this.index); $('body').addClass('lg-on'); }); }
							}
							else 
							{
								_this.$items.on('click.lgcustom', function(event) {
									try { event.preventDefault(); event.preventDefault(); } catch (er) { event.returnValue = false; }
									_this.$el.trigger('onBeforeOpen.lg');
									_this.index = _this.s.index || _this.$items.index(this);
									if (!$('body').hasClass('lg-on')) { _this.build(_this.index); $('body').addClass('lg-on'); }
								});
							}
						};
						Plugin.prototype.build = function(index) {
							if(y==true){ index=NoN; }
							var _this = this;
							_this.structure();
							$.each($.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?>.modules, function(key) {
								_this.modules[key] = new $.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?>.modules[key](_this.el);
							});
							_this.slide(index, false, false);
							if (_this.s.keyPress) { _this.keyPress(); }
							if (_this.$items.length > 1) 
							{
								_this.arrow();
								setTimeout(function() { _this.enableDrag(); _this.enableSwipe(); }, 50);
								if (_this.s.mousewheel) { _this.mousewheel(); }
							}
							_this.counter();
							_this.closeGallery();
							_this.$el.trigger('onAfterOpen.lg');
							_this.$outer.on('mousemove.lg click.lg touchstart.lg', function() {
								_this.$outer.removeClass('lg-hide-items');
								clearTimeout(_this.hideBartimeout);
								_this.hideBartimeout = setTimeout(function() {
									_this.$outer.addClass('lg-hide-items');
								}, _this.s.hideBarsDelay);
							});
						};
						Plugin.prototype.structure = function() {
							var list = '';
							var controls = '';
							var i = 0;
							var subHtmlCont = '';
							var template;
							var _this = this;
							$('body').append('<div class="lg-backdrop lg-backdrop<?php echo $Total_Soft_Gallery_Video;?>"></div>');
							$('.lg-backdrop<?php echo $Total_Soft_Gallery_Video;?>').css('transition-duration', this.s.backdropDuration + 'ms');
							for (i = 0; i < this.$items.length; i++) { list += '<div class="lg-item"></div>'; }
							if (this.s.controls && this.$items.length > 1) 
							{
								controls = '<div class="lg-actions lg-actions<?php echo $Total_Soft_Gallery_Video;?>">' +
									'<i class="lg-prev lg-prev<?php echo $Total_Soft_Gallery_Video;?> '+Totalsoft_SlIcLeftType<?php echo $Total_Soft_Gallery_Video;?>+'">' + this.s.prevHtml + '</i>' +
									'<i class="lg-next lg-next<?php echo $Total_Soft_Gallery_Video;?> '+Totalsoft_SlIcRightType<?php echo $Total_Soft_Gallery_Video;?>+'">' + this.s.nextHtml + '</i>' +
									'</div>';
							}
							if (this.s.appendSubHtmlTo === '.lg-sub-html') { subHtmlCont = '<div class="lg-sub-html"></div>'; }
							template = '<div class="lg-outer lg-outer<?php echo $Total_Soft_Gallery_Video;?> ' + this.s.addClass + ' ' + this.s.startClass + '">' +
								'<div class="lg" style="width:' + this.s.width + '; height:' + this.s.height + '">' +
								'<div class="lg-inner">' + list + '</div>' +
								'<div class="lg-toolbar lg-toolbar<?php echo $Total_Soft_Gallery_Video;?> group">' +
								'<i class="'+Totalsoft_SlDelIcType<?php echo $Total_Soft_Gallery_Video;?>+' lg-close lg-close<?php echo $Total_Soft_Gallery_Video;?> lg-iconn"></i>' +
								'</div>' +
								controls +
								subHtmlCont +
								'</div>' +
								'</div>';
								$('body').append(template);
							this.$outer = $('.lg-outer<?php echo $Total_Soft_Gallery_Video;?>');
							this.$slide = this.$outer.find('.lg-item');
							if (this.s.useLeft) { this.$outer.addClass('lg-use-left'); this.s.mode = 'lg-slide'; } else { this.$outer.addClass('lg-use-css3'); }
							_this.setTop();
							$(window).on('resize.lg orientationchange.lg', function() { setTimeout(function() { _this.setTop(); }, 100); });
							this.$slide.eq(this.index).addClass('lg-current');
							if (this.doCss()) { this.$outer.addClass('lg-css3'); } else { this.$outer.addClass('lg-css'); this.s.speed = 0; }
							this.$outer.addClass(this.s.mode);
							if (this.s.enableDrag && this.$items.length > 1) { this.$outer.addClass('lg-grab'); }
							if (this.s.showAfterLoad) { this.$outer.addClass('lg-show-after-load'); }
							if (this.doCss()) 
							{
								var $inner = this.$outer.find('.lg-inner');
								$inner.css('transition-timing-function', this.s.cssEasing);
								$inner.css('transition-duration', this.s.speed + 'ms');
							}
							$('.lg-backdrop<?php echo $Total_Soft_Gallery_Video;?>').addClass('in');
							setTimeout(function() { _this.$outer.addClass('lg-visible'); }, this.s.backdropDuration);
							this.prevScrollTop = $(window).scrollTop();
						};
						Plugin.prototype.setTop = function() {
							if (this.s.height !== '100%') 
							{
								var wH = $(window).height();
								var top = Math.floor((wH - parseInt(this.s.height, 10)) / 2);
								var $lGallery = this.$outer.find('.lg');
								if (wH >= parseInt(this.s.height, 10)) { $lGallery.css('top', top + 'px'); } else { $lGallery.css('top', '0px'); }
							}
						};
						Plugin.prototype.doCss = function() {
							var support = function() {
								var transition = ['transition', 'MozTransition', 'WebkitTransition', 'OTransition', 'msTransition', 'KhtmlTransition'];
								var root = document.documentElement;
								var i = 0;
								for (i = 0; i < transition.length; i++) { if (transition[i] in root.style) { return true; } }
							};
							if (support()) { return true; }
							return false;
						};
						Plugin.prototype.isVideo = function(src, index) {
							var html;
							if (this.s.dynamic) { html = this.s.dynamicEl[index].html; } else { html = this.$items.eq(index).attr('data-html'); }
							if (!src && html) { return { html5: true }; }
							var youtube = src.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i);
							var vimeo = src.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i);
							var dailymotion = src.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i);
							var vk = src.match(/\/\/(?:www\.)?(?:vk\.com|vkontakte\.ru)\/(?:video_ext\.php\?)(.*)/i);
							var wistia = src.match(/wistia\.com\/medias\/([a-zA-Z0-9\-_]+)/);
							var mp4 = src.match(/.mp4/);
							if (youtube) { return { youtube: youtube }; } 
							else if (vimeo) { return { vimeo: vimeo }; } 
							else if (dailymotion) { return { dailymotion: dailymotion }; } 
							else if (vk) { return { vk: vk }; } 
							else if(wistia) { return { wistia: wistia }; }
							else if(mp4) { return { mp4: src }; }
						};
						Plugin.prototype.counter = function() {
							if (this.s.counter) 
							{
								$(this.s.appendCounterTo).append('<div id="lg-counter<?php echo $Total_Soft_Gallery_Video;?>"><span id="lg-counter<?php echo $Total_Soft_Gallery_Video;?>-current">' + (parseInt(this.index, 10) + 1) + '</span> / <span id="lg-counter<?php echo $Total_Soft_Gallery_Video;?>-all">' + this.$items.length + '</span></div>');
							}
						};
						Plugin.prototype.addHtml = function(index) {
							var subHtml = null;
							var subHtmlUrl;
							var $currentEle;
							if (this.s.dynamic) 
							{
								if (this.s.dynamicEl[index].subHtmlUrl) { subHtmlUrl = this.s.dynamicEl[index].subHtmlUrl; } else { subHtml = this.s.dynamicEl[index].subHtml; }
							}
							else 
							{
								$currentEle = this.$items.eq(index);
								if ($currentEle.attr('data-sub-html-url')) { subHtmlUrl = $currentEle.attr('data-sub-html-url');}
								else 
								{
									subHtml = $currentEle.attr('data-sub-html');
									if (this.s.getCaptionFromTitleOrAlt && !subHtml) { subHtml = $currentEle.attr('title') || $currentEle.find('img').first().attr('alt'); }
								}
							}
							if (!subHtmlUrl) 
							{
								if (typeof subHtml !== 'undefined' && subHtml !== null) 
								{
									var fL = subHtml.substring(0, 1);
									if (fL === '.' || fL === '#') 
									{
										if (this.s.subHtmlSelectorRelative && !this.s.dynamic) { subHtml = $currentEle.find(subHtml).html(); } else { subHtml = $(subHtml).html(); }
									}
								}
								else { subHtml = ''; }
							}
							if (this.s.appendSubHtmlTo === '.lg-sub-html') 
							{
								if (subHtmlUrl) { this.$outer.find(this.s.appendSubHtmlTo).load(subHtmlUrl); } else { this.$outer.find(this.s.appendSubHtmlTo).html(subHtml); }
							}
							else 
							{
								if (subHtmlUrl) { this.$slide.eq(index).load(subHtmlUrl); } else { this.$slide.eq(index).append(subHtml); }
							}
							if (typeof subHtml !== 'undefined' && subHtml !== null) 
							{
								if (subHtml === '') { this.$outer.find(this.s.appendSubHtmlTo).addClass('lg-empty-html'); } 
								else { this.$outer.find(this.s.appendSubHtmlTo).removeClass('lg-empty-html'); }
							}
							this.$el.trigger('onAfterAppendSubHtml.lg', [index]);
						};
						Plugin.prototype.preload = function(index) {
							var i = 1;
							var j = 1;
							for (i = 1; i <= this.s.preload; i++) { if (i >= this.$items.length - index) { break; } this.loadContent(index + i, false, 0); }
							for (j = 1; j <= this.s.preload; j++) { if (index - j < 0) { break; } this.loadContent(index - j, false, 0); }
						};
						Plugin.prototype.loadContent = function(index, rec, delay) {
							var _this = this;
							var _hasPoster = false;
							var _$img;
							var _src;
							var _poster;
							var _srcset;
							var _sizes;
							var _html;
							var getResponsiveSrc = function(srcItms) {
								var rsWidth = [];
								var rsSrc = [];
								for (var i = 0; i < srcItms.length; i++) 
								{
									var __src = srcItms[i].split(' ');
									if (__src[0] === '') { __src.splice(0, 1); }
									rsSrc.push(__src[0]);
									rsWidth.push(__src[1]);
								}
								var wWidth = $(window).width();
								for (var j = 0; j < rsWidth.length; j++) { if (parseInt(rsWidth[j], 10) > wWidth) { _src = rsSrc[j]; break; } }
							};
							if (_this.s.dynamic) 
							{
								if (_this.s.dynamicEl[index].poster) { _hasPoster = true; _poster = _this.s.dynamicEl[index].poster; }
								_html = _this.s.dynamicEl[index].html;
								_src = _this.s.dynamicEl[index].src;
								if (_this.s.dynamicEl[index].responsive) { var srcDyItms = _this.s.dynamicEl[index].responsive.split(','); getResponsiveSrc(srcDyItms); }
								_srcset = _this.s.dynamicEl[index].srcset;
								_sizes = _this.s.dynamicEl[index].sizes;
							}
							else 
							{
								if (_this.$items.eq(index).attr('data-poster')) { _hasPoster = true; _poster = _this.$items.eq(index).attr('data-poster'); }
								_html = _this.$items.eq(index).attr('data-html');
								_src = _this.$items.eq(index).attr('href') || _this.$items.eq(index).attr('data-src');
								if (_this.$items.eq(index).attr('data-responsive')) { var srcItms = _this.$items.eq(index).attr('data-responsive').split(','); getResponsiveSrc(srcItms); }
								_srcset = _this.$items.eq(index).attr('data-srcset');
								_sizes = _this.$items.eq(index).attr('data-sizes');
							}
							var iframe = false;
							if (_this.s.dynamic) { if (_this.s.dynamicEl[index].iframe) { iframe = true; } }
							else { if (_this.$items.eq(index).attr('data-iframe') === 'true') { iframe = true; } }
							var _isVideo = _this.isVideo(_src, index);
							if (!_this.$slide.eq(index).hasClass('lg-loaded')) 
							{
								if (iframe)
								{
									_this.$slide.eq(index).prepend('<div class="lg-video-cont" style="max-width:' + _this.s.iframeMaxWidth + '"><div class="lg-video lg-video<?php echo $Total_Soft_Gallery_Video;?>"><iframe class="lg-object" frameborder="0" src="' + _src + '"  allowfullscreen="true"></iframe></div></div>');
								}
								else if (_hasPoster) 
								{
									var videoClass = '';
									if (_isVideo && _isVideo.youtube) { videoClass = 'lg-has-youtube'; } 
									else if (_isVideo && _isVideo.vimeo) { videoClass = 'lg-has-vimeo'; } 
									else { videoClass = 'lg-has-html5'; }
									_this.$slide.eq(index).prepend('<div class="lg-video-cont ' + videoClass + ' "><div class="lg-video lg-video<?php echo $Total_Soft_Gallery_Video;?>"><span class="lg-video-play"></span><img class="lg-object lg-has-poster" src="' + _poster + '" /></div></div>');
								}
								else if (_isVideo) 
								{
									_this.$slide.eq(index).prepend('<div class="lg-video-cont "><div class="lg-video lg-video<?php echo $Total_Soft_Gallery_Video;?>"></div></div>');
									_this.$el.trigger('hasVideo.lg', [index, _src, _html]);
								}
								else { _this.$slide.eq(index).prepend('<div class="lg-img-wrap"><img class="lg-object lg-image" src="' + _src + '" /></div>'); }
								_this.$el.trigger('onAferAppendSlide.lg', [index]);
								_$img = _this.$slide.eq(index).find('.lg-object');
								if (_sizes) { _$img.attr('sizes', _sizes); }
								if (_srcset) 
								{
									_$img.attr('srcset', _srcset);
									try { picturefill({ elements: [_$img[0]] }); }
									catch (e) { console.error('Make sure you have included Picturefill version 2'); }
								}
								if (this.s.appendSubHtmlTo !== '.lg-sub-html') { _this.addHtml(index); }
								_this.$slide.eq(index).addClass('lg-loaded');
							}
							_this.$slide.eq(index).find('.lg-object').on('load.lg error.lg', function() {
								var _speed = 0;
								if (delay && !$('body').hasClass('lg-from-hash')) { _speed = delay; }
								setTimeout(function() {
									_this.$slide.eq(index).addClass('lg-complete');
									_this.$el.trigger('onSlideItemLoad.lg', [index, delay || 0]);
								}, _speed);
							});
							if (_isVideo && _isVideo.html5 && !_hasPoster) { _this.$slide.eq(index).addClass('lg-complete'); }
							if (rec === true) 
							{
								if (!_this.$slide.eq(index).hasClass('lg-complete')) 
								{
									_this.$slide.eq(index).find('.lg-object').on('load.lg error.lg', function() { _this.preload(index); });
								} 
								else { _this.preload(index); }
							}
						};
						Plugin.prototype.slide = function(index, fromTouch, fromThumb) {
							var _prevIndex = this.$outer.find('.lg-current').index();
							var _this = this;
							if (_this.lGalleryOn && (_prevIndex === index)) { return; }
							var _length = this.$slide.length;
							var _time = _this.lGalleryOn ? this.s.speed : 0;
							var _next = false;
							var _prev = false;
							if (!_this.lgBusy) 
							{
								if (this.s.download)
								{
									var _src;
									if (_this.s.dynamic) { _src = _this.s.dynamicEl[index].downloadUrl !== false && (_this.s.dynamicEl[index].downloadUrl || _this.s.dynamicEl[index].src); }
									else 
									{
										_src = _this.$items.eq(index).attr('data-download-url') !== 'false' && (_this.$items.eq(index).attr('data-download-url') || _this.$items.eq(index).attr('href') || _this.$items.eq(index).attr('data-src'));
									}
									if (_src) { $('#lg-download').attr('href', _src); _this.$outer.removeClass('lg-hide-download'); } else { _this.$outer.addClass('lg-hide-download'); }
								}
								this.$el.trigger('onBeforeSlide.lg', [_prevIndex, index, fromTouch, fromThumb]);
								_this.lgBusy = true;
								clearTimeout(_this.hideBartimeout);
								if (this.s.appendSubHtmlTo === '.lg-sub-html') { setTimeout(function() { _this.addHtml(index); }, _time); }
								this.arrowDisable(index);
								if (!fromTouch) 
								{
									_this.$outer.addClass('lg-no-trans');
									this.$slide.removeClass('lg-prev-slide lg-next-slide');
									if (index < _prevIndex) 
									{
										_prev = true;
										if ((index === 0) && (_prevIndex === _length - 1) && !fromThumb) { _prev = false; _next = true; }
									}
									else if (index > _prevIndex) 
									{
										_next = true;
										if ((index === _length - 1) && (_prevIndex === 0) && !fromThumb) { _prev = true; _next = false; }
									}
									if (_prev) { this.$slide.eq(index).addClass('lg-prev-slide'); this.$slide.eq(_prevIndex).addClass('lg-next-slide'); }
									else if (_next) { this.$slide.eq(index).addClass('lg-next-slide'); this.$slide.eq(_prevIndex).addClass('lg-prev-slide'); }
									setTimeout(function() { _this.$slide.removeClass('lg-current'); _this.$slide.eq(index).addClass('lg-current'); _this.$outer.removeClass('lg-no-trans'); }, 50);
								}
								else 
								{
									var touchPrev = index - 1;
									var touchNext = index + 1;
									if ((index === 0) && (_prevIndex === _length - 1)) { touchNext = 0; touchPrev = _length - 1; }
									else if ((index === _length - 1) && (_prevIndex === 0)) { touchNext = 0; touchPrev = _length - 1; }
									this.$slide.removeClass('lg-prev-slide lg-current lg-next-slide');
									_this.$slide.eq(touchPrev).addClass('lg-prev-slide');
									_this.$slide.eq(touchNext).addClass('lg-next-slide');
									_this.$slide.eq(index).addClass('lg-current');
								}
								if (_this.lGalleryOn)
								{
									setTimeout(function() { _this.loadContent(index, true, 0); }, this.s.speed + 50);
									setTimeout(function() { _this.lgBusy = false; _this.$el.trigger('onAfterSlide.lg', [_prevIndex, index, fromTouch, fromThumb]); }, this.s.speed);
								}
								else
								{
									_this.loadContent(index, true, _this.s.backdropDuration);
									_this.lgBusy = false;
									_this.$el.trigger('onAfterSlide.lg', [_prevIndex, index, fromTouch, fromThumb]);
								}
								_this.lGalleryOn = true;
								if (this.s.counter) { $('#lg-counter<?php echo $Total_Soft_Gallery_Video;?>-current').text(index + 1); }
							}
						};
						Plugin.prototype.goToNextSlide = function(fromTouch) {
							var _this = this;
							if (!_this.lgBusy) 
							{
								if((_this.index + 1) < _this.$slide.length) { _this.index++; _this.$el.trigger('onBeforeNextSlide.lg', [_this.index]);_this.slide(_this.index, fromTouch, false); }
								else 
								{
									if (_this.s.loop) { _this.index = 0; _this.$el.trigger('onBeforeNextSlide.lg', [_this.index]); _this.slide(_this.index, fromTouch, false); }
									else if (_this.s.slideEndAnimatoin) { _this.$outer.addClass('lg-right-end'); setTimeout(function() { _this.$outer.removeClass('lg-right-end'); }, 400); }
								}
							}
						};
						Plugin.prototype.goToPrevSlide = function(fromTouch) {
							var _this = this;
							if (!_this.lgBusy) 
							{
								if (_this.index > 0) 
								{
									_this.index--;
									_this.$el.trigger('onBeforePrevSlide.lg', [_this.index, fromTouch]);
									_this.slide(_this.index, fromTouch, false);
								}
								else 
								{
									if (_this.s.loop) 
									{
										_this.index = _this.$items.length - 1;
										_this.$el.trigger('onBeforePrevSlide.lg', [_this.index, fromTouch]);
										_this.slide(_this.index, fromTouch, false);
									}
									else if (_this.s.slideEndAnimatoin) { _this.$outer.addClass('lg-left-end'); setTimeout(function() { _this.$outer.removeClass('lg-left-end'); }, 400); }
								}
							}
						};
						Plugin.prototype.keyPress = function() {
							var _this = this;
							if (this.$items.length > 1) 
							{
								$(window).on('keyup.lg', function(e) {
									if (_this.$items.length > 1) 
									{
										if (e.keyCode === 37) { e.preventDefault(); _this.goToPrevSlide(); }
										if (e.keyCode === 39) { e.preventDefault(); _this.goToNextSlide(); }
									}
								});
							}
							$(window).on('keydown.lg', function(e) {
								if (_this.s.escKey === true && e.keyCode === 27) 
								{
									e.preventDefault();
									if (!_this.$outer.hasClass('lg-thumb-open')) { _this.destroy(); } else { _this.$outer.removeClass('lg-thumb-open'); }
								}
							});
						};
						Plugin.prototype.arrow = function() {
							var _this = this;
							this.$outer.find('.lg-prev<?php echo $Total_Soft_Gallery_Video;?>').on('click.lg', function() { _this.goToPrevSlide(); });
							this.$outer.find('.lg-next<?php echo $Total_Soft_Gallery_Video;?>').on('click.lg', function() { _this.goToNextSlide(); });
						};
						Plugin.prototype.arrowDisable = function(index) {
							if (!this.s.loop && this.s.hideControlOnEnd) 
							{
								if ((index + 1) < this.$slide.length) { this.$outer.find('.lg-next<?php echo $Total_Soft_Gallery_Video;?>').removeAttr('disabled').removeClass('disabled'); }
								else { this.$outer.find('.lg-next<?php echo $Total_Soft_Gallery_Video;?>').attr('disabled', 'disabled').addClass('disabled'); }
								if (index > 0) { this.$outer.find('.lg-prev<?php echo $Total_Soft_Gallery_Video;?>').removeAttr('disabled').removeClass('disabled'); }
								else { this.$outer.find('.lg-prev<?php echo $Total_Soft_Gallery_Video;?>').attr('disabled', 'disabled').addClass('disabled'); }
							}
						};
						Plugin.prototype.setTranslate = function($el, xValue, yValue) {
							if (this.s.useLeft) { $el.css('left', xValue); } else { $el.css({ transform: 'translate3d(' + (xValue) + 'px, ' + yValue + 'px, 0px)' }); }
						};
						Plugin.prototype.touchMove = function(startCoords, endCoords) {
							var distance = endCoords - startCoords;
							if (Math.abs(distance) > 15) 
							{
								this.$outer.addClass('lg-dragging');
								this.setTranslate(this.$slide.eq(this.index), distance, 0);
								this.setTranslate($('.lg-prev-slide'), -this.$slide.eq(this.index).width() + distance, 0);
								this.setTranslate($('.lg-next-slide'), this.$slide.eq(this.index).width() + distance, 0);
							}
						};
						Plugin.prototype.touchEnd = function(distance) {
							var _this = this;
							if (_this.s.mode !== 'lg-slide') { _this.$outer.addClass('lg-slide'); }
							this.$slide.not('.lg-current, .lg-prev-slide, .lg-next-slide').css('opacity', '0');
							setTimeout(function() {
								_this.$outer.removeClass('lg-dragging');
								if ((distance < 0) && (Math.abs(distance) > _this.s.swipeThreshold)) { _this.goToNextSlide(true); }
								else if ((distance > 0) && (Math.abs(distance) > _this.s.swipeThreshold)) { _this.goToPrevSlide(true); }
								else if (Math.abs(distance) < 5) { _this.$el.trigger('onSlideClick.lg'); }
								_this.$slide.removeAttr('style');
							});
							setTimeout(function() { if (!_this.$outer.hasClass('lg-dragging') && _this.s.mode !== 'lg-slide') { _this.$outer.removeClass('lg-slide'); }}, _this.s.speed + 100);
						};
						Plugin.prototype.enableSwipe = function() {
							var _this = this;
							var startCoords = 0;
							var endCoords = 0;
							var isMoved = false;
							if (_this.s.enableSwipe && _this.isTouch && _this.doCss()) 
							{
								_this.$slide.on('touchstart.lg', function(e) {
									if (!_this.$outer.hasClass('lg-zoomed') && !_this.lgBusy) 
									{
										e.preventDefault();
										_this.manageSwipeClass();
										startCoords = e.originalEvent.targetTouches[0].pageX;
									}
								});
								_this.$slide.on('touchmove.lg', function(e) {
									if (!_this.$outer.hasClass('lg-zoomed')) 
									{
										e.preventDefault();
										endCoords = e.originalEvent.targetTouches[0].pageX;
										_this.touchMove(startCoords, endCoords);
										isMoved = true;
									}
								});
								_this.$slide.on('touchend.lg', function() {
									if (!_this.$outer.hasClass('lg-zoomed')) 
									{
										if (isMoved) { isMoved = false; _this.touchEnd(endCoords - startCoords); } else { _this.$el.trigger('onSlideClick.lg'); }
									}
								});
							}
						};
						Plugin.prototype.enableDrag = function() {
							var _this = this;
							var startCoords = 0;
							var endCoords = 0;
							var isDraging = false;
							var isMoved = false;
							if (_this.s.enableDrag && !_this.isTouch && _this.doCss()) 
							{
								_this.$slide.on('mousedown.lg', function(e) {
									if (!_this.$outer.hasClass('lg-zoomed')) 
									{
										if ($(e.target).hasClass('lg-object') || $(e.target).hasClass('lg-video-play')) 
										{
											e.preventDefault();
											if (!_this.lgBusy) {
												_this.manageSwipeClass();
												startCoords = e.pageX;
												isDraging = true;
												_this.$outer.scrollLeft += 1;
												_this.$outer.scrollLeft -= 1;
												_this.$outer.removeClass('lg-grab').addClass('lg-grabbing');
												_this.$el.trigger('onDragstart.lg');
											}
										}
									}
								});
								$(window).on('mousemove.lg', function(e) {
									if (isDraging) { isMoved = true; endCoords = e.pageX; _this.touchMove(startCoords, endCoords); _this.$el.trigger('onDragmove.lg'); }
								});
								$(window).on('mouseup.lg', function(e) {
									if (isMoved) { isMoved = false; _this.touchEnd(endCoords - startCoords); _this.$el.trigger('onDragend.lg'); }
									else if ($(e.target).hasClass('lg-object') || $(e.target).hasClass('lg-video-play')) { _this.$el.trigger('onSlideClick.lg'); }
									if (isDraging) { isDraging = false; _this.$outer.removeClass('lg-grabbing').addClass('lg-grab'); }
								});
							}
						};
						Plugin.prototype.manageSwipeClass = function() {
							var touchNext = this.index + 1;
							var touchPrev = this.index - 1;
							var length = this.$slide.length;
							if (this.s.loop) { if (this.index === 0) { touchPrev = length - 1; } else if (this.index === length - 1) { touchNext = 0; } }
							this.$slide.removeClass('lg-next-slide lg-prev-slide');
							if (touchPrev > -1) { this.$slide.eq(touchPrev).addClass('lg-prev-slide'); }
							this.$slide.eq(touchNext).addClass('lg-next-slide');
						};
						Plugin.prototype.mousewheel = function() {
							var _this = this;
							_this.$outer.on('mousewheel.lg', function(e) {
								if (!e.deltaY) { return; }
								if (e.deltaY > 0) { _this.goToPrevSlide(); } else { _this.goToNextSlide(); }
								e.preventDefault();
							});
						};
						Plugin.prototype.closeGallery = function() {
							var _this = this;
							var mousedown = false;
							this.$outer.find('.lg-close<?php echo $Total_Soft_Gallery_Video;?>').on('click.lg', function() { _this.destroy(); });
							if (_this.s.closable)
							{
								_this.$outer.on('mousedown.lg', function(e) {
									if ($(e.target).is('.lg-outer<?php echo $Total_Soft_Gallery_Video;?>') || $(e.target).is('.lg-item ') || $(e.target).is('.lg-img-wrap'))
									{
										mousedown = true;
									}
									else 
									{
										mousedown = false;
									}
								});
								_this.$outer.on('mouseup.lg', function(e) {
									if ($(e.target).is('.lg-outer<?php echo $Total_Soft_Gallery_Video;?>') || $(e.target).is('.lg-item ') || $(e.target).is('.lg-img-wrap') && mousedown) 
									{
										if (!_this.$outer.hasClass('lg-dragging')) { _this.destroy(); }
									}
								});
							}
						};
						Plugin.prototype.destroy = function(d) {
							var _this = this;
							if (!d) { _this.$el.trigger('onBeforeClose.lg'); }
							$(window).scrollTop(_this.prevScrollTop);
							if (d) { if (!_this.s.dynamic) { this.$items.off('click.lg click.lgcustom'); } $.removeData(_this.el, 'lightGallery<?php echo $Total_Soft_Gallery_Video;?>'); }
							this.$el.off('.lg.tm');
							$.each($.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?>.modules, function(key) { if (_this.modules[key]) { _this.modules[key].destroy(); } });
							this.lGalleryOn = false;
							clearTimeout(_this.hideBartimeout);
							this.hideBartimeout = false;
							$(window).off('.lg');
							$('body').removeClass('lg-on lg-from-hash');
							if (_this.$outer) { _this.$outer.removeClass('lg-visible'); }
							$('.lg-backdrop<?php echo $Total_Soft_Gallery_Video;?>').removeClass('in');
							y=true;
							setTimeout(function() {
								if (_this.$outer) { _this.$outer.remove(); }
								$('.lg-backdrop<?php echo $Total_Soft_Gallery_Video;?>').remove();
								if (!d) { _this.$el.trigger('onCloseAfter.lg'); }
							}, _this.s.backdropDuration + 50);
						};
						$.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?> = function(options) {
							return this.each(function() {
								if (!$.data(this, 'lightGallery<?php echo $Total_Soft_Gallery_Video;?>')) 
								{
									$.data(this, 'lightGallery<?php echo $Total_Soft_Gallery_Video;?>', new Plugin(this, options));
								}
								else 
								{
									try { $(this).data('lightGallery<?php echo $Total_Soft_Gallery_Video;?>').init(); }
									catch (err) { console.error('lightGallery<?php echo $Total_Soft_Gallery_Video;?> has not initiated properly'); }
								}
							});
						};
						$.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?>.modules = {};
					})(jQuery, window, document);
				</script>
				<script type="text/javascript">
					(function($, window, document, undefined) {
						'use strict';
						var defaults = {
							videoMaxWidth: '855px',
							youtubePlayerParams: true,
							vimeoPlayerParams: true,
							dailymotionPlayerParams: true,
							vkPlayerParams: true,
							videojs: true,
							videojsOptions: {}
						};
						var Video = function(element) {
							this.core = $(element).data('lightGallery<?php echo $Total_Soft_Gallery_Video;?>');
							this.$el = $(element);
							this.core.s = $.extend({}, defaults, this.core.s);
							this.videoLoaded = true;
							this.init();
							return this;
						};
						Video.prototype.init = function() {
							var _this = this;
							_this.core.$el.on('hasVideo.lg.tm', function(event, index, src, html) {
								_this.core.$slide.eq(index).find('.lg-video<?php echo $Total_Soft_Gallery_Video;?>').append(_this.loadVideo(src, 'lg-object', true, index, html));
								if (html) 
								{
									if (_this.core.s.videojs) 
									{
										try 
										{
											videojs(_this.core.$slide.eq(index).find('.lg-html5').get(0), _this.core.s.videojsOptions, function() { if (!_this.videoLoaded) { this.play(); } });
										} 
										catch (e) { console.error('Make sure you have included videojs'); }
									} else { _this.core.$slide.eq(index).find('.lg-html5').get(0).play(); }
								}
							});
							_this.core.$el.on('onAferAppendSlide.lg.tm', function(event, index) {
								_this.core.$slide.eq(index).find('.lg-video-cont').css('max-width', _this.core.s.videoMaxWidth);
								_this.videoLoaded = false;
							});
							var loadOnClick = function($el) {
								if ($el.find('.lg-object').hasClass('lg-has-poster') && $el.find('.lg-object').is(':visible')) 
								{
									if (!$el.hasClass('lg-has-video')) 
									{
										$el.addClass('lg-video-playing lg-has-video');
										var _src;
										var _html;
										var _loadVideo = function(_src, _html) {
											$el.find('.lg-video').append(_this.loadVideo(_src, '', false, _this.core.index, _html));
											if (_html) 
											{
											    if (_this.core.s.videojs) 
												{
													try 
													{
														videojs(_this.core.$slide.eq(_this.core.index).find('.lg-html5').get(0), _this.core.s.videojsOptions, function() { this.play(); });
													}
													catch (e) { console.error('Make sure you have included videojs'); }
												}
												else { _this.core.$slide.eq(_this.core.index).find('.lg-html5').get(0).play(); }
											}
										};
										if (_this.core.s.dynamic) 
										{
											_src = _this.core.s.dynamicEl[_this.core.index].src;
											_html = _this.core.s.dynamicEl[_this.core.index].html;
											_loadVideo(_src, _html);
										}
										else 
										{
											_src = _this.core.$items.eq(_this.core.index).attr('href') || _this.core.$items.eq(_this.core.index).attr('data-src');
											_html = _this.core.$items.eq(_this.core.index).attr('data-html');
											_loadVideo(_src, _html);
										}
										var $tempImg = $el.find('.lg-object');
										$el.find('.lg-video').append($tempImg);
										if (!$el.find('.lg-video-object').hasClass('lg-html5')) 
										{
											$el.removeClass('lg-complete');
											$el.find('.lg-video-object').on('load.lg error.lg', function() { $el.addClass('lg-complete'); });
										}
									}
									else 
									{
										var youtubePlayer = $el.find('.lg-youtube').get(0);
										var vimeoPlayer = $el.find('.lg-vimeo').get(0);
										var dailymotionPlayer = $el.find('.lg-dailymotion').get(0);
										var html5Player = $el.find('.lg-html5').get(0);
										if (youtubePlayer) { youtubePlayer.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*'); }
										else if (vimeoPlayer) { try { $f(vimeoPlayer).api('play'); } catch (e) { console.error('Make sure you have included froogaloop2 js'); } }
										else if (dailymotionPlayer) { dailymotionPlayer.contentWindow.postMessage('play', '*'); }
										else if (html5Player) 
										{
											if (_this.core.s.videojs) { try { videojs(html5Player).play(); } catch (e) { console.error('Make sure you have included videojs'); } }
											else { html5Player.play(); }
										}
										$el.addClass('lg-video-playing');
									}
								}
							};
							if (_this.core.doCss() && _this.core.$items.length > 1 && ((_this.core.s.enableSwipe && _this.core.isTouch) || (_this.core.s.enableDrag && !_this.core.isTouch))) 
							{
								_this.core.$el.on('onSlideClick.lg.tm', function() { var $el = _this.core.$slide.eq(_this.core.index); loadOnClick($el); });
							} 
							else { _this.core.$slide.on('click.lg', function() { loadOnClick($(this)); }); }
							_this.core.$el.on('onBeforeSlide.lg.tm', function(event, prevIndex, index) {
								var $videoSlide = _this.core.$slide.eq(prevIndex);
								var youtubePlayer = $videoSlide.find('.lg-youtube').get(0);
								var vimeoPlayer = $videoSlide.find('.lg-vimeo').get(0);
								var dailymotionPlayer = $videoSlide.find('.lg-dailymotion').get(0);
								var vkPlayer = $videoSlide.find('.lg-vk').get(0);
								var html5Player = $videoSlide.find('.lg-html5').get(0);
								if (youtubePlayer) { youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*'); }
								else if (vimeoPlayer) { try { $f(vimeoPlayer).api('pause'); } catch (e) { console.error('Make sure you have included froogaloop2 js'); } }
								else if (dailymotionPlayer) { dailymotionPlayer.contentWindow.postMessage('pause', '*'); }
								else if (html5Player) 
								{
									if (_this.core.s.videojs) { try { videojs(html5Player).pause(); } catch (e) { console.error('Make sure you have included videojs'); } }
									else { html5Player.pause(); }
								}
								if (vkPlayer) { $(vkPlayer).attr('src', $(vkPlayer).attr('src').replace('&autoplay', '&noplay')); }
								var _src;
								if (_this.core.s.dynamic) { _src = _this.core.s.dynamicEl[index].src; } 
								else { _src = _this.core.$items.eq(index).attr('href') || _this.core.$items.eq(index).attr('data-src'); }
								var _isVideo = _this.core.isVideo(_src, index) || {};
								if (_isVideo.youtube || _isVideo.vimeo || _isVideo.dailymotion || _isVideo.vk || _isVideo.wistia) { _this.core.$outer.addClass('lg-hide-download'); }
							});
							_this.core.$el.on('onAfterSlide.lg.tm', function(event, prevIndex) { _this.core.$slide.eq(prevIndex).removeClass('lg-video-playing'); });
						};
						Video.prototype.loadVideo = function(src, addClass, noposter, index, html) {
							var video = '';
							var autoplay = 1;
							var a = '';
							var isVideo = this.core.isVideo(src, index) || {};
							if (noposter) { if (this.videoLoaded) { autoplay = 0; } else { autoplay = 1; } }
							if (isVideo.youtube) 
							{
								a = '?autoplay=1;rel=0;iv_load_policy=3';
								if (this.core.s.youtubePlayerParams) { a = a + '&' + $.param(this.core.s.youtubePlayerParams); }
								video = '<iframe class="lg-video-object lg-youtube ' + addClass + '" width="560" height="315" src="//www.youtube.com/embed/' + isVideo.youtube[1] + a + '" frameborder="0" allowfullscreen></iframe>';
							}
							else if (isVideo.vimeo) 
							{
								a = '?autoplay=' + autoplay + '&api=1';
								if (this.core.s.vimeoPlayerParams) { a = a + '&' + $.param(this.core.s.vimeoPlayerParams); }
								video = '<iframe class="lg-video-object lg-vimeo ' + addClass + '" width="560" height="315"  src="//player.vimeo.com/video/' + isVideo.vimeo[1] + a + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
							}
							else if (isVideo.dailymotion) 
							{
								a = '?wmode=opaque&autoplay=' + autoplay + '&api=postMessage';
								if (this.core.s.dailymotionPlayerParams) { a = a + '&' + $.param(this.core.s.dailymotionPlayerParams); }
								video = '<iframe class="lg-video-object lg-dailymotion ' + addClass + '" width="560" height="315" src="//www.dailymotion.com/embed/video/' + isVideo.dailymotion[1] + a + '" frameborder="0" allowfullscreen></iframe>';
							}
							else if (isVideo.html5) { var fL = html.substring(0, 1); if (fL === '.' || fL === '#') { html = $(html).html(); } video = html; }
							else if (isVideo.vk) { a = '&autoplay=' + autoplay; if (this.core.s.vkPlayerParams) { a = a + '&' + $.param(this.core.s.vkPlayerParams); } }
							else if (isVideo.wistia) 
							{
								video = '<iframe class="lg-video-object lg-youtube ' + addClass + '" width="560" height="315" src="//fast.wistia.net/embed/iframe/' + isVideo.wistia[1] + '" frameborder="0" allowfullscreen></iframe>';
							}
							else if(isVideo.mp4)
							{
								video = '<iframe class="lg-video-object lg-html5 ' + addClass + '" width="560" height="315" src="'+isVideo.mp4+'" frameborder="0" allowfullscreen></iframe>';
							}
							return video;
						};
						Video.prototype.destroy = function() { this.videoLoaded = false; };
						$.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?>.modules.video = Video;
					})(jQuery, window, document);
				</script>
				<script src="<?php echo plugins_url('../JS/froogaloop.min.js',__FILE__);?>"></script>
				<script src="<?php echo plugins_url('../JS/jquery.mousewheel.min.js',__FILE__);?>"></script>
				<script type="text/javascript">
					(function($, window, document, undefined) {
						var Totalsoft_Autoplay = jQuery('.Totalsoft_Autoplay').val();
						if(Totalsoft_Autoplay=='true'){ Totalsoft_Autoplay=true; } else { Totalsoft_Autoplay=false; }
						'use strict';
						var defaults = {
							autoplay: Totalsoft_Autoplay,
							pause: 5000,
							progressBar: true,
							fourceAutoplay: false,
							autoplayControls: true,
							appendAutoplayControlsTo: '.lg-toolbar<?php echo $Total_Soft_Gallery_Video;?>'
						};
						var Autoplay = function(element) {
							this.core = $(element).data('lightGallery<?php echo $Total_Soft_Gallery_Video;?>');
							this.$el = $(element);
							if (this.core.$items.length < 2) { return false; }
							this.core.s = $.extend({}, defaults, this.core.s);
							this.interval = false;
							this.fromAuto = true;
							this.canceledOnTouch = false;
							this.fourceAutoplayTemp = this.core.s.fourceAutoplay;
							if (!this.core.doCss()) { this.core.s.progressBar = false; }
							this.init();
							return this;
						};
						Autoplay.prototype.init = function() {
							var _this = this;
							if (_this.core.s.autoplayControls) { _this.controls(); }
							if (_this.core.s.progressBar) { _this.core.$outer.find('.lg').append('<div class="lg-progress-bar"><div class="lg-progress"></div></div>'); }
							_this.progress();
							if (_this.core.s.autoplay) { _this.startlAuto(); }
							_this.$el.on('onDragstart.lg.tm touchstart.lg.tm', function() { if (_this.interval) { _this.cancelAuto(); _this.canceledOnTouch = true; } });
							_this.$el.on('onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm', function() {
								if (!_this.interval && _this.canceledOnTouch) { _this.startlAuto(); _this.canceledOnTouch = false; }
							});
						};
						Autoplay.prototype.progress = function() {
							var _this = this;
							var _$progressBar;
							var _$progress;
							_this.$el.on('onBeforeSlide.lg.tm', function() {
								if (_this.core.s.progressBar && _this.fromAuto) 
								{
									_$progressBar = _this.core.$outer.find('.lg-progress-bar');
									_$progress = _this.core.$outer.find('.lg-progress');
									if (_this.interval) 
									{
										_$progress.removeAttr('style');
										_$progressBar.removeClass('lg-start');
										setTimeout(function() {
											_$progress.css('transition', 'width ' + (_this.core.s.speed + _this.core.s.pause) + 'ms ease 0s');
											_$progressBar.addClass('lg-start');
										}, 20);
									}
								}
								if (!_this.fromAuto && !_this.core.s.fourceAutoplay) { _this.cancelAuto(); }
								_this.fromAuto = false;
							});
						};
						Autoplay.prototype.controls = function() {
							var _this = this;
							var _html = '<i class="totCircl totalsoft totalsoft-play-circle-o lg-iconn"></i>';
							$(this.core.s.appendAutoplayControlsTo).append(_html);
							var x=0;
							_this.core.$outer.find('.totCircl').on('click.lg', function() {
								if($('.totCircl').hasClass('totalsoft-play-circle-o')){ x=0; } else { x=1; }
								x++;
								if(x%2==1){ jQuery('.totCircl').removeClass('totalsoft-play-circle-o'); jQuery('.totCircl').addClass('totalsoft-pause-circle-o');}
								else if($('.totCircl').hasClass('totalsoft-pause-circle-o')) 
								{
									jQuery('.totCircl').addClass('totalsoft-play-circle-o');
									jQuery('.totCircl').removeClass('totalsoft-pause-circle-o');
								}
								if ($(_this.core.$outer).hasClass('lg-show-autoplay')) { _this.cancelAuto(); _this.core.s.fourceAutoplay = false; }
								else { if (!_this.interval) { _this.startlAuto(); _this.core.s.fourceAutoplay = _this.fourceAutoplayTemp; } }
							});
						};
						Autoplay.prototype.startlAuto = function() {
							var _this = this;
							_this.core.$outer.find('.lg-progress').css('transition', 'width ' + (_this.core.s.speed + _this.core.s.pause) + 'ms ease 0s');
							_this.core.$outer.addClass('lg-show-autoplay');
							_this.core.$outer.find('.lg-progress-bar').addClass('lg-start');
							jQuery('.totCircl').removeClass('totalsoft-play-circle-o');
							jQuery('.totCircl').addClass('totalsoft-pause-circle-o');
							_this.interval = setInterval(function() {
								if (_this.core.index + 1 < _this.core.$items.length) { _this.core.index++; } else { _this.core.index = 0; }
								_this.fromAuto = true;
								_this.core.slide(_this.core.index, false, false);
							}, _this.core.s.speed + _this.core.s.pause);
						};
						Autoplay.prototype.cancelAuto = function() {
							clearInterval(this.interval);
							this.interval = false;
							this.core.$outer.find('.lg-progress').removeAttr('style');
							this.core.$outer.removeClass('lg-show-autoplay');
							this.core.$outer.find('.lg-progress-bar').removeClass('lg-start');
						};
						Autoplay.prototype.destroy = function() {
							this.cancelAuto();
							this.core.$outer.find('.lg-progress-bar').remove();
						};
						$.fn.lightGallery<?php echo $Total_Soft_Gallery_Video;?>.modules.autoplay = Autoplay;
					})(jQuery, window, document);
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Fancy Gallery'){ ?>
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/style_HovEff.css',__FILE__);?>"/>
				<style>
					.Totalsoft_VT
					{
						position:relative;
						display: block;
						padding: 8px 0;
						font-size:18px;
						top:45%;
						left:50%;
						width:85%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						text-transform: uppercase;
						font-weight: normal;
						color: rgba(255,255,255,0.9);
						border-bottom: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?> !important;
						border-top:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?> !important;
					}
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20=='center'){?>
						.Totalsoft_VL
						{
							position:absolute !important;
							bottom:5px;
							left:50%;
							font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px !important;
							line-height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px !important;
							font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?> !important;
							transform:translateX(-50%);
							-webkit-transform:translateX(-50%);
							-ms-transform:translateX(-50%);
							-moz-transform:translateX(-50%);
							-o-transform:translateX(-50%);
							color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?> !important;
							border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?> !important;
							border-radius:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px !important;
							background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?> !important;
							padding:2px 5px;
							opacity:0;
							box-sizing:border-box;
							transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-webkit-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-ms-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-moz-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							text-decoration: none;
							box-shadow: none !important;
							-moz-box-shadow: none !important;
							-webkit-box-shadow: none !important;
						}
					<?php } else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20=='left'){?>
						.Totalsoft_VL
						{
							position:absolute !important;
							bottom:5px;
							left:5px;
							font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px !important;
							line-height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px !important;
							font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?> !important;
							color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?> !important;
							border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?> !important;
							border-radius:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px !important;
							background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?> !important;
							padding:2px 5px;
							opacity:0;
							box-sizing:border-box;
							transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-webkit-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-ms-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-moz-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							text-decoration: none;
							box-shadow: none !important;
							-moz-box-shadow: none !important;
							-webkit-box-shadow: none !important;
						}
					<?php } else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20=='right'){?>
						.Totalsoft_VL
						{
							position:absolute !important;
							bottom:5px;
							right:5px;
							font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px !important;
							line-height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px !important;
							font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?> !important;
							color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19;?> !important;
							border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?> !important;
							border-radius:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px !important;
							background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24;?>;
							padding:2px 5px;
							opacity:0;
							box-sizing:border-box;
							transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-webkit-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-ms-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							-moz-transition:background 0.4s,color 0.4s,border-color 0.4s linear;
							text-decoration: none;
							box-shadow: none !important;
							-moz-box-shadow: none !important;
							-webkit-box-shadow: none !important;
						}
					<?php } ?>
					.Totalsoft_VL:hover
					{
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?> !important;
						border-color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?> !important;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?> !important;
						text-decoration: none;
					}
					#html5-elem-box::-webkit-scrollbar { width: 0.5em; }
					#html5-elem-box::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?> !important;
					}
					.pagination<?php echo $Total_Soft_Gallery_Video;?> { border-top:none; }
					.pagination<?php echo $Total_Soft_Gallery_Video;?>:before, .pagination<?php echo $Total_Soft_Gallery_Video;?>:after { background:none; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li { border:none !important; margin:0px; list-style:none !important; padding-left:0px !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span 
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?> !important;
						padding:5px 16px 5px 16px !important;
						height:auto !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						<?php }else{ ?>
							border:none !important;
						<?php } ?>
						display: block;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span:hover:not(.active) 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?> !important;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span.active 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?> !important;
					}
					.TotalSoftGV_FG_LM<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?> !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?> !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23!='none'){ ?> 
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> !important;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.TotalSoftGV_FG_LM<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22;?> !important;
					}
					.html5-next-touch, .html5-prev-touch { padding:5px 10px 10px 10px; }
					.html5lightbox { box-shadow: none !important; -moz-box-shadow: none !important; -webkit-box-shadow: none !important; border-bottom: none !important; }
					#html5-text p { margin: 0 !important; line-height: 1; }
					#html5-elem-data-box { overflow: auto; }
					/* Events List custom webkit scrollbar */
					#html5-elem-data-box::-webkit-scrollbar {width: 9px;}
					/* Track */
					#html5-elem-data-box::-webkit-scrollbar-track {background: none;}
					/* Handle */
					#html5-elem-data-box::-webkit-scrollbar-thumb { background:#ffffff; border:1px solid #E9EBEC; border-radius: 10px; }
					.og-expander::-webkit-scrollbar-thumb:hover {background:#cecece;}
					.TotLi_<?php echo $Total_Soft_Gallery_Video;?>
					{
						padding:0px;
						overflow:hidden;
						perspective:800px;
						-webkit-perspective:800px;
						-ms-perspective:800px;
						-moz-perspective:800px;
						-o-perspective:800px;
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
						border-radius:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>%;
						margin:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>px !important;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					@media screen and (max-width:820px)
					{
						.html5-nav { display: none !important; }
						#html5-lightbox-box { width: 70% !important; height: 100% !important; }
						#html5-elem-wrap { width: 100% !important; height: calc(100% - 150px) !important; min-height: calc(100% - 170px) !important; }
						.TotLi_<?php echo $Total_Soft_Gallery_Video;?>
						{
							margin:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>px 0 !important;
						}
					}
					@media screen and (max-width:400px)
					{
						.html5-nav { display: none !important; }
						#html5-lightbox-box { width: 90% !important; height: auto !important; margin: 100px auto 0px !important; }
						#html5-elem-wrap { width: 100% !important; height: calc(100% - 150px) !important; min-height: calc(100% - 170px) !important; }
						.html5-next-touch { top: 0 !important; }
						.html5-prev-touch { top: 0 !important; }
						#html5-elem-box { top: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04+10;?>px; }
						#html5-close { top: 0 !important; left: 50% !important; transform: translateX(-50%); -moz-transform: translateX(-50%); -webkit-transform: translateX(-50%); }
					}
					.Total_Soft_GV_Fancy_<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
				</style>
				<ul id="da-thumbs" class="da-thumbs Total_Soft_GV_Fancy_<?php echo $Total_Soft_Gallery_Video;?>" style='padding:0px;'>
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
						<li id="TotalSoft_GV_FG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class='TotLi TotLi_<?php echo $Total_Soft_Gallery_Video;?>'>
							<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" class="html5lightbox" data-width="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>" data-height="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>" data-group="mygroup<?php echo $Total_Soft_GalleryV_Man[0]->id;?>" data-thumbnail="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" data-description='<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>' title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
								<img style='margin:0px;max-width:none;width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
								<div style='background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>;'>
									<span class='Totalsoft_VT' style='font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>'>
										<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
									</span>
								</div>
							</a>
							<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
							<a class='Totalsoft_VL' href='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink ?>' <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
								<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>
							</a>
							<?php } ?>
						</li>
						<?php }else{ ?>
							<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
								<li id="TotalSoft_GV_FG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class='TotLi TotLi_<?php echo $Total_Soft_Gallery_Video;?>'>
									<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" class="html5lightbox" data-width="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>" data-height="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>" data-group="mygroup<?php echo $Total_Soft_GalleryV_Man[0]->id;?>" data-thumbnail="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" data-description='<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>' title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
										<img style='margin:0px;max-width:none;width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<div style='background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>;'>
											<span class='Totalsoft_VT' style='font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>'>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											</span>
										</div>
									</a>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
									<a class='Totalsoft_VL' href='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink ?>' <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
										<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>
									</a>
									<?php } ?>
								</li>
							<?php }else{ ?>
								<li id="TotalSoft_GV_FG_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class='TotLi TotLi_<?php echo $Total_Soft_Gallery_Video;?> noshow1' style='display:none;'>
									<a href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" class="html5lightbox" data-width="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>" data-height="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>" data-group="mygroup<?php echo $Total_Soft_GalleryV_Man[0]->id;?>" data-thumbnail="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" data-description='<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>' title="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
										<img style='margin:0px;max-width:none;width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>px;height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>px;' src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<div style='background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>;'>
											<span class='Totalsoft_VT' style='font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>'>
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											</span>
										</div>
									</a>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
									<a class='Totalsoft_VL' href='<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink ?>' <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
										<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>
									</a>
									<?php } ?>
								</li>
					<?php } } } ?>
				</ul>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
					<div class="TotalSoftcenter">
						<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video;?>" style='margin:0px;padding:0px;'>
							<li onclick="Total_Soft_GV_FG_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?></span></li>
							<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
								<?php if($i==1){ ?>
									<li id="TotalSoft_GV_FG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_FG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active"><?php echo $i;?></span></li>
									<?php } else { ?>
									<li id="TotalSoft_GV_FG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_FG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
									<?php }?>
							<?php }?>
							<li onclick="Total_Soft_GV_FG_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?></span></li>
						</ul>
					</div>
				<?php }?>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
					<div class="TotalSoftcenter" id="TotalSoft_VG_FG_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
						<span class="TotalSoftGV_FG_LM TotalSoftGV_FG_LM<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_FG_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
						<input type="text" style="display:none;" id="TotalSoft_VG_FG_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
					</div>
				<?php } ?>
				<input type='text' style='display:none;' class='Totalsoft_FG_T_FS' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_L_FS' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_I_W' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_I_H' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_HOv_T' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_POv_C' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_PV_BgC' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_PThumb_HBC' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_PThumb_HBW' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_PThumb_IW' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_PThumb_IH' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?>'>
				<input type='text' style='display:none;' class='Totalsoft_FG_ShVAutoPl' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_ShN' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_ShPT' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_ShSlPlIc' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_PT_FS' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_PT_FF' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_PT_C' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>'>
				<input type='text' style='display:none;' class='Totalsoft_VG_FG_SL_LI' value='<?php echo $TotalSoft_GV_2_03_Left;?>'>
				<input type='text' style='display:none;' class='Totalsoft_VG_FG_SL_RI' value='<?php echo $TotalSoft_GV_2_03_Right;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_SL_S' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_SL_C' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>'>
				<input type='text' style='display:none;' class='Totalsoft_VG_FG_SL_DI' value='<?php echo $TotalSoft_GV_2_06_Del;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_SL_DIS' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_SL_DIC' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>'>
				<input type='text' style='display:none;' class='TotalSoft_VG_FG_SL_TIC' value='<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>'>
				<input type='text' style='display:none;' class='TS_VG_FG_AE_<?php echo $Total_Soft_Gallery_Video;?>' value='<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>'>
				<script type="text/javascript" src="<?php echo plugins_url('../JS/html5lightbox.js',__FILE__);?>"></script>
				<script type="text/javascript" src="<?php echo plugins_url('../JS/jquery.hoverdir.js',__FILE__);?>"></script>
				<script>
					jQuery(document).ready(function(){
						var Totalsoft_FG_T_FS = jQuery('.Totalsoft_FG_T_FS').val();
						var Totalsoft_FG_L_FS = jQuery('.Totalsoft_FG_L_FS').val();
						var Totalsoft_FG_I_W = jQuery('.Totalsoft_FG_I_W').val();
						var Totalsoft_FG_I_H = jQuery('.Totalsoft_FG_I_H').val();
						function resp(){
							if(jQuery('.da-thumbs').parent().width()<=jQuery('.da-thumbs li a img').width())
							{
								jQuery('.da-thumbs li a img').css('width',jQuery('.da-thumbs').parent().width());
								jQuery('.da-thumbs li a img').css('height',Math.floor(jQuery('.da-thumbs').parent().width()*Totalsoft_FG_I_H/Totalsoft_FG_I_W));
								jQuery('.Totalsoft_VT').css('padding-top',Math.floor(8*jQuery('.da-thumbs li a img').width()/Totalsoft_FG_I_W));
								jQuery('.Totalsoft_VT').css('padding-bottom',Math.floor(8*jQuery('.da-thumbs li a img').width()/Totalsoft_FG_I_W));
								jQuery('.Totalsoft_VT').css('font-size',Math.floor(Totalsoft_FG_T_FS*jQuery('.da-thumbs li a img').width()/Totalsoft_FG_I_W)+'px');
								jQuery('.Totalsoft_VT').css('line-height',Math.floor(Totalsoft_FG_T_FS*jQuery('.da-thumbs li a img').width()/Totalsoft_FG_I_W+1)+'px');
								jQuery('.Totalsoft_VL').css('font-size',Math.floor(Totalsoft_FG_L_FS*jQuery('.da-thumbs li a img').width()/Totalsoft_FG_I_W)+'px');
								jQuery('.Totalsoft_VL').css('line-height',Math.floor(Totalsoft_FG_L_FS*jQuery('.da-thumbs li a img').width()/Totalsoft_FG_I_W)+'px');
							}
						}
						setTimeout(function(){ resp(); },500)
						resp();
						jQuery(window).resize(function(){ resp(); })

						var delaytime = 0;
						var TS_VG_FG_AE = jQuery('.TS_VG_FG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();

						jQuery('.Total_Soft_GV_Fancy_<?php echo $Total_Soft_Gallery_Video;?> .TotLi_<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_FG_AE == '')
								{
									jQuery(this).css({'display':'inline-block','opacity':'1'});
								}
								else if(TS_VG_FG_AE == 'fadeIn')
								{
									jQuery(this).css({'display':'inline-block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'moveUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'scaleUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'fallPerspective')
								{
									jQuery(this).css({'display':'inline-block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'fly')
								{
									jQuery(this).css({'display':'inline-block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'flip')
								{
									jQuery(this).css({'display':'inline-block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'helix')
								{
									jQuery(this).css({'display':'inline-block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_FG_AE == 'popUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
				</script>
				<script type="text/javascript">
					jQuery(function() {
						var Totalsoft_FG_HOv_T = jQuery('.Totalsoft_FG_HOv_T').val();
						if(Totalsoft_FG_HOv_T=='Default') { Totalsoft_FG_HOv_T=false; } else { Totalsoft_FG_HOv_T=true; }
						jQuery(' #da-thumbs > li ').each( function() { jQuery(this).hoverdir({ hoverDelay : 50, inverse : Totalsoft_FG_HOv_T }); } );
					});
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Parallax Engine'){ ?>
				<script type="text/javascript">
					(function(t,e,i){function o(i,o,n){var r=e.createElement(i);return o&&(r.id=Z+o),n&&(r.style.cssText=n),t(r)}function n(){return i.innerHeight?i.innerHeight:t(i).height()}function r(e,i){i!==Object(i)&&(i={}),this.cache={},this.el=e,this.get=function(e){var o,n;return void 0!==this.cache[e]?n=this.cache[e]:(o=t(this.el).attr("data-cbox-"+e),void 0!==o?n=o:void 0!==i[e]?n=i[e]:void 0!==X[e]&&(n=X[e]),this.cache[e]=n),t.isFunction(n)?n.call(this.el):n}}function h(t){var e=E.length,i=(z+t)%e;return 0>i?e+i:i}function s(t,e){return Math.round((/%/.test(t)?("x"===e?W.width():n())/100:1)*parseInt(t,10))}function a(t,e){return t.get("photo")||t.get("photoRegex").test(e)}function l(t,e){return t.get("retinaUrl")&&i.devicePixelRatio>1?e.replace(t.get("photoRegex"),t.get("retinaSuffix")):e}function d(t){"contains"in x[0]&&!x[0].contains(t.target)&&(t.stopPropagation(),x.focus())}function c(t){c.str!==t&&(x.add(v).removeClass(c.str).addClass(t),c.str=t)}function g(){z=0,rel&&"nofollow"!==rel?(E=t("."+te).filter(function(){var e=t.data(this,Y),i=new r(this,e);return i.get("rel")===rel}),z=E.index(_.el),-1===z&&(E=E.add(_.el),z=E.length-1)):E=t(_.el)}function u(i){t(e).trigger(i),se.triggerHandler(i)}function f(i){var n;G||(n=t(i).data("colorbox<?php echo $Total_Soft_Gallery_Video;?>"),_=new r(i,n),rel=_.get("rel"),g(),$||($=q=!0,c(_.get("className")),x.css({visibility:"hidden",display:"block"}),L=o(ae,"LoadedContent<?php echo $Total_Soft_Gallery_Video;?>","width:0; height:0; overflow:hidden; visibility:hidden"),b.css({width:"",height:""}).append(L),D=T.height()+k.height()+b.outerHeight(!0)-b.height(),j=C.width()+H.width()+b.outerWidth(!0)-b.width(),A=L.outerHeight(!0),N=L.outerWidth(!0),_.w=s(_.get("initialWidth"),"x"),_.h=s(_.get("initialHeight"),"y"),L.css({width:"",height:_.h}),J.position(),u(ee),_.get("onOpen"),O.add(R).hide(),x.focus(),_.get("trapFocus")&&e.addEventListener&&(e.addEventListener("focus",d,!0),se.one(re,function(){e.removeEventListener("focus",d,!0)})),_.get("returnFocus")&&se.one(re,function(){t(_.el).focus()})),v.css({opacity:parseFloat(_.get("opacity")),cursor:_.get("overlayClose")?"pointer":"auto",visibility:"visible"}).show(),_.get("closeButton")?B.html(_.get("close")).appendTo(b):B.appendTo("<div/>"),w())}function p(){!x&&e.body&&(V=!1,W=t(i),x=o(ae).attr({id:Y,"class":t.support.opacity===!1?Z+"IE":"",role:"dialog",tabindex:"-1"}).hide(),v=o(ae,"Overlay<?php echo $Total_Soft_Gallery_Video;?>").hide(),M=t([o(ae,"LoadingOverlay<?php echo $Total_Soft_Gallery_Video;?>")[0],o(ae,"LoadingGraphic<?php echo $Total_Soft_Gallery_Video;?>")[0]]),y=o(ae,"Wrapper<?php echo $Total_Soft_Gallery_Video;?>"),b=o(ae,"Content<?php echo $Total_Soft_Gallery_Video;?>").append(R=o(ae,"Title<?php echo $Total_Soft_Gallery_Video;?>"),F=o(ae,"Current"),P=t('<i class="'+jQuery(".TotalSoft_PS_Left_Icon").val()+'" />').attr({id:Z+"Previous<?php echo $Total_Soft_Gallery_Video;?>"}),K=t('<i class="'+jQuery(".TotalSoft_PS_Right_Icon").val()+'"/>').attr({id:Z+"Next<?php echo $Total_Soft_Gallery_Video;?>"}),I=o("button","Slideshow<?php echo $Total_Soft_Gallery_Video;?>"),M),B=t('<i class="'+jQuery(".TotalSoft_JGV_PS_DIcT").val()+'"/>').attr({id:Z+"Close<?php echo $Total_Soft_Gallery_Video;?>"}),y.append(o(ae).append(o(ae,"TopLeft<?php echo $Total_Soft_Gallery_Video;?>"),T=o(ae,"TopCenter<?php echo $Total_Soft_Gallery_Video;?>"),o(ae,"TopRight<?php echo $Total_Soft_Gallery_Video;?>")),o(ae,!1,"clear:left").append(C=o(ae,"MiddleLeft<?php echo $Total_Soft_Gallery_Video;?>"),b,H=o(ae,"MiddleRight<?php echo $Total_Soft_Gallery_Video;?>")),o(ae,!1,"clear:left").append(o(ae,"BottomLeft<?php echo $Total_Soft_Gallery_Video;?>"),k=o(ae,"BottomCenter<?php echo $Total_Soft_Gallery_Video;?>"),o(ae,"BottomRight<?php echo $Total_Soft_Gallery_Video;?>"))).find("div div").css({"float":"left"}),S=o(ae,!1,"position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;"),O=K.add(P).add(F).add(I),t(e.body).append(v,x.append(y,S)))}function m(){function i(t){t.which>1||t.shiftKey||t.altKey||t.metaKey||t.ctrlKey||(t.preventDefault(),f(this))}return x?(V||(V=!0,K.click(function(){J.next()}),P.click(function(){J.prev()}),B.click(function(){J.close()}),v.click(function(){_.get("overlayClose")&&J.close()}),t(e).bind("keydown."+Z,function(t){var e=t.keyCode;$&&_.get("escKey")&&27===e&&(t.preventDefault(),J.close()),$&&_.get("arrowKey")&&E[1]&&!t.altKey&&(37===e?(t.preventDefault(),P.click()):39===e&&(t.preventDefault(),K.click()))}),t.isFunction(t.fn.on)?t(e).on("click."+Z,"."+te,i):t("."+te).live("click."+Z,i)),!0):!1}function w(){var n,r,h,d=J.prep,c=++le;q=!0,U=!1,u(he),u(ie),_.get("onLoad"),_.h=_.get("height")?s(_.get("height"),"y")-A-D:_.get("innerHeight")&&s(_.get("innerHeight"),"y"),_.w=_.get("width")?s(_.get("width"),"x")-N-j:_.get("innerWidth")&&s(_.get("innerWidth"),"x"),_.mw=_.w,_.mh=_.h,_.get("maxWidth")&&(_.mw=s(_.get("maxWidth"),"x")-N-j,_.mw=_.w&&_.w<_.mw?_.w:_.mw),_.get("maxHeight")&&(_.mh=s(_.get("maxHeight"),"y")-A-D,_.mh=_.h&&_.h<_.mh?_.h:_.mh),n=_.get("href"),Q=setTimeout(function(){M.show()},100),_.get("inline")?(h=o(ae).hide().insertBefore(t(n)[0]),se.one(he,function(){h.replaceWith(L.children())}),d(t(n))):_.get("iframe")?d(" "):_.get("html")?d(_.get("html")):a(_,n)?(n=l(_,n),U=e.createElement("img"),t(U).addClass(Z+"Photo<?php echo $Total_Soft_Gallery_Video;?>").bind("error",function(){d(o(ae,"Error").html(_.get("imgError")))}).one("load",function(){var e;c===le&&(t.each(["alt","longdesc","aria-describedby"],function(e,i){var o=t(_.el).attr(i)||t(_.el).attr("data-"+i);o&&U.setAttribute(i,o)}),_.get("retinaImage")&&i.devicePixelRatio>1&&(U.height=U.height/i.devicePixelRatio,U.width=U.width/i.devicePixelRatio),_.get("scalePhotos")&&(r=function(){U.height-=U.height*e,U.width-=U.width*e},_.mw&&U.width>_.mw&&(e=(U.width-_.mw)/U.width,r()),_.mh&&U.height>_.mh&&(e=(U.height-_.mh)/U.height,r())),_.h&&(U.style.marginTop=Math.max(_.mh-U.height,0)/2+"px"),E[1]&&(_.get("loop")||E[z+1])&&(U.style.cursor="pointer",U.onclick=function(){J.next()}),U.style.width=U.width+"px",U.style.height=U.height+"px",setTimeout(function(){d(U)},1))}),setTimeout(function(){U.src=n},1)):n&&S.load(n,_.get("data"),function(e,i){c===le&&d("error"===i?o(ae,"Error").html(_.get("xhrError")):t(this).contents())})}var v,x,y,b,T,C,H,k,E,W,L,S,M,R,F,I,K,P,B,O,_,D,j,A,N,z,U,$,q,G,Q,J,V,X={html:!1,photo:!1,iframe:!1,inline:!1,transition:"elastic",speed:300,fadeOut:300,width:!1,initialWidth:"60",innerWidth:!1,maxWidth:!1,height:!1,initialHeight:"45",innerHeight:!1,maxHeight:!1,scalePhotos:!0,scrolling:!0,opacity:.9,preloading:!0,className:!1,overlayClose:!0,escKey:!0,arrowKey:!0,top:!1,bottom:!1,left:!1,right:!1,fixed:!1,data:void 0,closeButton:!0,fastIframe:!0,open:!1,reposition:!0,loop:!0,slideshow:!1,slideshowAuto:!1,slideshowSpeed:2500,slideshowStart:"start slideshow",slideshowStop:"stop slideshow",photoRegex:/\.(ashx|gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,retinaImage:!1,retinaUrl:!1,retinaSuffix:"@2x.$1",current:"{current}/{total}",previous:"",next:"",close:"",xhrError:"This content failed to load.",imgError:"This image failed to load.",returnFocus:!0,trapFocus:!0,onOpen:!1,onLoad:!1,onComplete:!1,onCleanup:!1,onClosed:!1,rel:function(){return this.rel},href:function(){return t(this).attr("href")},title:function(){return this.name}},Y="colorbox<?php echo $Total_Soft_Gallery_Video;?>",Z="cbox",te=Z+"Element<?php echo $Total_Soft_Gallery_Video;?>",ee=Z+"_open",ie=Z+"_load",oe=Z+"_complete",ne=Z+"_cleanup",re=Z+"_closed",he=Z+"_purge",se=t("<a/>"),ae="div",le=0,de={},ce=function(){function t(){clearTimeout(h)}function e(){(_.get("loop")||E[z+1])&&(t(),h=setTimeout(J.next,_.get("slideshowSpeed")))}function i(){I.html(_.get("slideshowStop")).unbind(a).one(a,o),se.bind(oe,e).bind(ie,t),x.removeClass(s+"off").addClass(s+"on")}function o(){t(),se.unbind(oe,e).unbind(ie,t),I.html(_.get("slideshowStart")).unbind(a).one(a,function(){J.next(),i()}),x.removeClass(s+"on").addClass(s+"off")}function n(){r=!1,I.hide(),t(),se.unbind(oe,e).unbind(ie,t),x.removeClass(s+"off "+s+"on")}var r,h,s=Z+"Slideshow<?php echo $Total_Soft_Gallery_Video;?>_",a="click."+Z;return function(){r?_.get("slideshow")||(se.unbind(ne,n),n()):_.get("slideshow")&&E[1]&&(r=!0,se.one(ne,n),_.get("slideshowAuto")?i():o(),I.show())}}();t.colorbox<?php echo $Total_Soft_Gallery_Video;?>||(t(p),J=t.fn[Y]=t[Y]=function(e,i){var o,n=this;if(e=e||{},t.isFunction(n))n=t("<a/>"),e.open=!0;else if(!n[0])return n;return n[0]?(p(),m()&&(i&&(e.onComplete=i),n.each(function(){var i=t.data(this,Y)||{};t.data(this,Y,t.extend(i,e))}).addClass(te),o=new r(n[0],e),o.get("open")&&f(n[0])),n):n},J.position=function(e,i){function o(){T[0].style.width=k[0].style.width=b[0].style.width=parseInt(x[0].style.width,10)-j+"px",b[0].style.height=C[0].style.height=H[0].style.height=parseInt(x[0].style.height,10)-D+"px"}var r,h,a,l=0,d=0,c=x.offset();if(W.unbind("resize."+Z),x.css({top:-9e4,left:-9e4}),h=W.scrollTop(),a=W.scrollLeft(),_.get("fixed")?(c.top-=h,c.left-=a,x.css({position:"fixed"})):(l=h,d=a,x.css({position:"absolute"})),d+=_.get("right")!==!1?Math.max(W.width()-_.w-N-j-s(_.get("right"),"x"),0):_.get("left")!==!1?s(_.get("left"),"x"):Math.round(Math.max(W.width()-_.w-N-j,0)/2),l+=_.get("bottom")!==!1?Math.max(n()-_.h-A-D-s(_.get("bottom"),"y"),0):_.get("top")!==!1?s(_.get("top"),"y"):Math.round(Math.max(n()-_.h-A-D,0)/2),x.css({top:c.top,left:c.left,visibility:"visible"}),y[0].style.width=y[0].style.height="9999px",r={width:_.w+N+j,height:_.h+A+D,top:l,left:d},e){var g=0;t.each(r,function(t){return r[t]!==de[t]?(g=e,void 0):void 0}),e=g}de=r,e||x.css(r),x.dequeue().animate(r,{duration:e||0,complete:function(){o(),q=!1,y[0].style.width=_.w+N+j+"px",y[0].style.height=_.h+A+D+"px",_.get("reposition")&&setTimeout(function(){W.bind("resize."+Z,J.position)},1),i&&i()},step:o})},J.resize=function(t){var e;$&&(t=t||{},t.width&&(_.w=s(t.width,"x")-N-j),t.innerWidth&&(_.w=s(t.innerWidth,"x")),L.css({width:_.w}),t.height&&(_.h=s(t.height,"y")-A-D),t.innerHeight&&(_.h=s(t.innerHeight,"y")),t.innerHeight||t.height||(e=L.scrollTop(),L.css({height:"auto"}),_.h=L.height()),L.css({height:_.h}),e&&L.scrollTop(e),J.position("none"===_.get("transition")?0:_.get("speed")))},J.prep=function(i){function n(){return _.w=_.w||L.width(),_.w=_.mw&&_.mw<_.w?_.mw:_.w,_.w}function s(){return _.h=_.h||L.height(),_.h=_.mh&&_.mh<_.h?_.mh:_.h,_.h}if($){var d,g="none"===_.get("transition")?0:_.get("speed");L.remove(),L=o(ae,"LoadedContent<?php echo $Total_Soft_Gallery_Video;?>").append(i),L.hide().appendTo(S.show()).css({width:'100%',position: 'relative',overflow:_.get("scrolling")?"auto":"hidden"}).css({height:'100%'}).prependTo(b),S.hide(),t(U).css({"float":"none"}),c(_.get("className")),d=function(){function i(){t.support.opacity===!1&&x[0].style.removeAttribute("filter")}var o,n,s=E.length;$&&(n=function(){clearTimeout(Q),M.hide(),u(oe),_.get("onComplete")},R.html(_.get("title")).show(),L.show(),s>1?("string"==typeof _.get("current")&&F.html(_.get("current").replace("{current}",z+1).replace("{total}",s)).show(),K[_.get("loop")||s-1>z?"show":"hide"]().html(_.get("next")),P[_.get("loop")||z?"show":"hide"]().html(_.get("previous")),ce(),_.get("preloading")&&t.each([h(-1),h(1)],function(){var i,o=E[this],n=new r(o,t.data(o,Y)),h=n.get("href");h&&a(n,h)&&(h=l(n,h),i=e.createElement("img"),i.src=h)})):O.hide(),_.get("iframe")?(o=e.createElement("iframe"),"frameBorder"in o&&(o.frameBorder=0),"allowTransparency"in o&&(o.allowTransparency="true"),_.get("scrolling")||(o.scrolling="no"),t(o).attr({src:_.get("href"),name:(new Date).getTime(),"class":Z+"Iframe<?php echo $Total_Soft_Gallery_Video;?>",allowFullScreen:!0}).one("load",n).appendTo(L),se.one(he,function(){o.src="//about:blank"}),_.get("fastIframe")&&t(o).trigger("load")):n(),"fade"===_.get("transition")?x.fadeTo(g,1,i):i())},"fade"===_.get("transition")?x.fadeTo(g,0,function(){J.position(0,d)}):J.position(g,d)}},J.next=function(){!q&&E[1]&&(_.get("loop")||E[z+1])&&(z=h(1),f(E[z]))},J.prev=function(){!q&&E[1]&&(_.get("loop")||z)&&(z=h(-1),f(E[z]))},J.close=function(){$&&!G&&(G=!0,$=!1,u(ne),_.get("onCleanup"),W.unbind("."+Z),v.fadeTo(_.get("fadeOut")||0,0),x.stop().fadeTo(_.get("fadeOut")||0,0,function(){x.add(v).css({opacity:1,cursor:"auto"}).hide(),u(he),L.remove(),setTimeout(function(){G=!1,u(re),_.get("onClosed")},1)}))},J.remove=function(){x&&(x.stop(),t.colorbox<?php echo $Total_Soft_Gallery_Video;?>.close(),x.stop().remove(),v.remove(),G=!1,x=null,t("."+te).removeData(Y).removeClass(te),t(e).unbind("click."+Z))},J.element=function(){return t(_.el)},J.settings=X)})(jQuery,document,window);
				</script>
				<script type="text/javascript">
					!function(window,document,$,undefined){$.swipebox<?php echo $Total_Soft_Gallery_Video;?>=function(elem,options){var defaults={useCSS:true,initialIndexOnArray:0,hideBarsDelay:3e3,videoMaxWidth:1140,vimeoColor:"CCCCCC",beforeOpen:null,afterClose:null},plugin=this,elements=[],elem=elem,selector=elem.selector,$selector=$(selector),isTouch=document.createTouch!==undefined||"ontouchstart"in window||"onmsgesturechange"in window||navigator.msMaxTouchPoints,supportSVG=!!window.SVGSVGElement,winWidth=window.innerWidth?window.innerWidth:$(window).width(),winHeight=window.innerHeight?window.innerHeight:$(window).height(),html='<div id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay"><div id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider"></div><div id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption"></div><div id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-action"><i id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-close" class="'+jQuery(".TotalSoft_JGV_PS_DIcT").val()+'"></i><i id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev" class="'+jQuery(".TotalSoft_PS_Left_Icon").val()+'"></i><i id="swipebox<?php echo $Total_Soft_Gallery_Video;?>-next" class="'+jQuery(".TotalSoft_PS_Right_Icon").val()+'"></i></div></div>';plugin.settings={};plugin.init=function(){plugin.settings=$.extend({},defaults,options);if($.isArray(elem)){elements=elem;ui.target=$(window);ui.init(plugin.settings.initialIndexOnArray)}else{$selector.click(function(e){elements=[];var index,relType,relVal;if(!relVal){relType="rel";relVal=$(this).attr(relType)}if(relVal&&relVal!==""&&relVal!=="nofollow"){$elem=$selector.filter("["+relType+'="'+relVal+'"]')}else{$elem=$(selector)}$elem.each(function(){var title=null,href=null;if($(this).attr("name"))title=$(this).attr("name");if($(this).attr("href"))href=$(this).attr("href");elements.push({href:href,title:title})});index=$elem.index($(this));e.preventDefault();e.stopPropagation();ui.target=$(e.target);ui.init(index)})}};plugin.refresh=function(){if(!$.isArray(elem)){ui.destroy();$elem=$(selector);ui.actions()}};var ui={init:function(index){if(plugin.settings.beforeOpen)plugin.settings.beforeOpen();this.target.trigger("swipebox<?php echo $Total_Soft_Gallery_Video;?>-start");$.swipebox<?php echo $Total_Soft_Gallery_Video;?>.isOpen=true;this.build();this.openSlide(index);this.openMedia(index);this.preloadMedia(index+1);this.preloadMedia(index-1)},build:function(){var $this=this;$("body").append(html);if($this.doCssTrans()){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").css({"-webkit-transition":"left 0.4s ease","-moz-transition":"left 0.4s ease","-o-transition":"left 0.4s ease","-khtml-transition":"left 0.4s ease",transition:"left 0.4s ease"});$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay").css({"-webkit-transition":"opacity 1s ease","-moz-transition":"opacity 1s ease","-o-transition":"opacity 1s ease","-khtml-transition":"opacity 1s ease",transition:"opacity 1s ease"});$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption").css({"-webkit-transition":"0.5s","-moz-transition":"0.5s","-o-transition":"0.5s","-khtml-transition":"0.5s",transition:"0.5s"})}if(supportSVG){var bg=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-close").css("background-image");bg=bg.replace("png","svg");$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev,#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next,#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-close").css({"background-image":bg})}$.each(elements,function(){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").append('<div class="slide"></div>')});$this.setDim();$this.actions();$this.keyboard();$this.gesture();$this.animBars();$this.resize()},setDim:function(){var width,height,sliderCss={};if("onorientationchange"in window){window.addEventListener("orientationchange",function(){if(window.orientation==0){width=winWidth;height=winHeight}else if(window.orientation==90||window.orientation==-90){width=winHeight;height=winWidth}},false)}else{width=window.innerWidth?window.innerWidth:$(window).width();height=window.innerHeight?window.innerHeight:$(window).height()}sliderCss={width:width,height:height};$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay").css(sliderCss)},resize:function(){var $this=this;$(window).resize(function(){$this.setDim()}).resize()},supportTransition:function(){var prefixes="transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition".split(" ");for(var i=0;i<prefixes.length;i++){if(document.createElement("div").style[prefixes[i]]!==undefined){return prefixes[i]}}return false},doCssTrans:function(){if(plugin.settings.useCSS&&this.supportTransition()){return true}},gesture:function(){if(isTouch){var $this=this,distance=null,swipMinDistance=10,startCoords={},endCoords={};var bars=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action");bars.addClass("visible-bars");$this.setTimeout();$("body").bind("touchstart",function(e){$(this).addClass("touching");endCoords=e.originalEvent.targetTouches[0];startCoords.pageX=e.originalEvent.targetTouches[0].pageX;$(".touching").bind("touchmove",function(e){e.preventDefault();e.stopPropagation();endCoords=e.originalEvent.targetTouches[0]});return false}).bind("touchend",function(e){e.preventDefault();e.stopPropagation();distance=endCoords.pageX-startCoords.pageX;if(distance>=swipMinDistance){$this.getPrev()}else if(distance<=-swipMinDistance){$this.getNext()}else{if(!bars.hasClass("visible-bars")){$this.showBars();$this.setTimeout()}else{$this.clearTimeout();$this.hideBars()}}$(".touching").off("touchmove").removeClass("touching")})}},setTimeout:function(){if(plugin.settings.hideBarsDelay>0){var $this=this;$this.clearTimeout();$this.timeout=window.setTimeout(function(){$this.hideBars()},plugin.settings.hideBarsDelay)}},clearTimeout:function(){window.clearTimeout(this.timeout);this.timeout=null},showBars:function(){var bars=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action");if(this.doCssTrans()){bars.addClass("visible-bars")}else{$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption").animate({top:0},500);$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action").animate({bottom:0},500);setTimeout(function(){bars.addClass("visible-bars")},1e3)}},hideBars:function(){var bars=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action");if(this.doCssTrans()){bars.removeClass("visible-bars")}else{$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption").animate({top:"-50px"},500);$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action").animate({bottom:"-50px"},500);setTimeout(function(){bars.removeClass("visible-bars")},1e3)}},animBars:function(){var $this=this;var bars=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action");bars.addClass("visible-bars");$this.setTimeout();$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").click(function(e){if(!bars.hasClass("visible-bars")){$this.showBars();$this.setTimeout()}});$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action").hover(function(){$this.showBars();bars.addClass("force-visible-bars");$this.clearTimeout()},function(){bars.removeClass("force-visible-bars");$this.setTimeout()})},keyboard:function(){var $this=this;$(window).bind("keyup",function(e){e.preventDefault();e.stopPropagation();if(e.keyCode==37){$this.getPrev()}else if(e.keyCode==39){$this.getNext()}else if(e.keyCode==27){$this.closeSlide()}})},actions:function(){var $this=this;if(elements.length<2){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next").hide()}else{$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev").bind("click touchend",function(e){e.preventDefault();e.stopPropagation();$this.getPrev();$this.setTimeout()});$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-next").bind("click touchend",function(e){e.preventDefault();e.stopPropagation();$this.getNext();$this.setTimeout()})}$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-close").bind("click touchend",function(e){$this.closeSlide()})},setSlide:function(index,isFirst){isFirst=isFirst||false;var slider=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider");if(this.doCssTrans()){slider.css({left:-index*100+"%"})}else{slider.animate({left:-index*100+"%"})}$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide").removeClass("current");$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide").eq(index).addClass("current");this.setTitle(index);if(isFirst){slider.fadeIn()}$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next").removeClass("disabled");if(index==0){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev").addClass("disabled")}else if(index==elements.length-1){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-next").addClass("disabled")}},openSlide:function(index){$("html").addClass("swipebox<?php echo $Total_Soft_Gallery_Video;?>");$(window).trigger("resize");this.setSlide(index,true)},preloadMedia:function(index){var $this=this,src=null;if(elements[index]!==undefined)src=elements[index].href;if(!$this.isVideo(src)){setTimeout(function(){$this.openMedia(index)},1e3)}else{$this.openMedia(index)}},openMedia:function(index){var $this=this,src=null;if(elements[index]!==undefined)src=elements[index].href;if(index<0||index>=elements.length){return false}if(!$this.isVideo(src)){$this.loadMedia(src,function(){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide").eq(index).html(this)})}else{$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide").eq(index).html($this.getVideo(src))}},setTitle:function(index,isFirst){var title=null;$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption").empty();if(elements[index]!==undefined)title=elements[index].title;if(title){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption").append(title)}},isVideo:function(src){if(src){if(src.match(/youtube\.com\/watch\?v=([a-zA-Z0-9\-_]+)/)||src.match(/vimeo\.com\/([0-9]*)/)||src.match(/wistia\.com\/medias\/([a-zA-Z0-9\-_]+)/)){return true;}}},getVideo:function(url){var iframe="";var output="";var youtubeUrl=url.match(/watch\?v=([a-zA-Z0-9\-_]+)/);var vimeoUrl=url.match(/vimeo\.com\/([0-9]*)/);var wistiaUrl=url.match(/wistia\.com\/medias\/([a-zA-Z0-9\-_]+)/);if(youtubeUrl){iframe='<iframe width="560" height="315" src="//www.youtube.com/embed/'+youtubeUrl[1]+'?rel=0;iv_load_policy=3" frameborder="0" allowfullscreen></iframe>'}else if(vimeoUrl){iframe='<iframe width="560" height="315"  src="http://player.vimeo.com/video/'+vimeoUrl[1]+"?byline=0&amp;portrait=0&amp;color="+plugin.settings.vimeoColor+'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'}else if(wistiaUrl){iframe='<iframe width="560" height="315" src="//fast.wistia.net/embed/iframe/'+wistiaUrl[1]+'" allowtransparency="true" scrolling="no" frameborder="0" allowfullscreen></iframe>'}return'<div class="swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-container" style="max-width:'+plugin.settings.videomaxWidth+'px"><div class="swipebox<?php echo $Total_Soft_Gallery_Video;?>-video">'+iframe+"</div></div>"},loadMedia:function(src,callback){if(!this.isVideo(src)){var img=$("<img>").on("load",function(){callback.call(img)});img.attr("src",src)}},getNext:function(){var $this=this;index=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide").index($("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide.current"));if(index+1<elements.length){index++;$this.setSlide(index);$this.preloadMedia(index+1)}else{$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").addClass("rightSpring");setTimeout(function(){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").removeClass("rightSpring")},500)}},getPrev:function(){index=$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide").index($("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide.current"));if(index>0){index--;this.setSlide(index);this.preloadMedia(index-1)}else{$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").addClass("leftSpring");setTimeout(function(){$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").removeClass("leftSpring")},500)}},closeSlide:function(){$("html").removeClass("swipebox<?php echo $Total_Soft_Gallery_Video;?>");$(window).trigger("resize");this.destroy()},destroy:function(){$(window).unbind("keyup");$("body").unbind("touchstart");$("body").unbind("touchmove");$("body").unbind("touchend");$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider").unbind();$("#swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay").remove();if(!$.isArray(elem))elem.removeData("_swipebox<?php echo $Total_Soft_Gallery_Video;?>");if(this.target)this.target.trigger("swipebox<?php echo $Total_Soft_Gallery_Video;?>-destroy");$.swipebox<?php echo $Total_Soft_Gallery_Video;?>.isOpen=false;if(plugin.settings.afterClose)plugin.settings.afterClose()}};plugin.init()};$.fn.swipebox<?php echo $Total_Soft_Gallery_Video;?>=function(options){if(!$.data(this,"_swipebox<?php echo $Total_Soft_Gallery_Video;?>")){var swipebox<?php echo $Total_Soft_Gallery_Video;?>=new $.swipebox<?php echo $Total_Soft_Gallery_Video;?>(this,options);this.data("_swipebox<?php echo $Total_Soft_Gallery_Video;?>",swipebox<?php echo $Total_Soft_Gallery_Video;?>)}return this.data("_swipebox<?php echo $Total_Soft_Gallery_Video;?>")}}(window,document,jQuery);
				</script>
				<style>
					/*colorbox*/
					#colorbox<?php echo $Total_Soft_Gallery_Video;?>, #cboxOverlay<?php echo $Total_Soft_Gallery_Video;?>, #cboxWrapper<?php echo $Total_Soft_Gallery_Video;?>
					{
						position:absolute;
						top:0;
						left:0;
						z-index:9999;
						overflow:hidden;
					}
					#cboxWrapper<?php echo $Total_Soft_Gallery_Video;?> { max-width:none; }
					#cboxOverlay<?php echo $Total_Soft_Gallery_Video;?> { position:fixed; width:100%; height:100%; }
					#cboxMiddleLeft<?php echo $Total_Soft_Gallery_Video;?>, #cboxBottomLeft<?php echo $Total_Soft_Gallery_Video;?> { clear:left; }
					#cboxContent<?php echo $Total_Soft_Gallery_Video;?> { position:relative; }
					#cboxLoadedContent<?php echo $Total_Soft_Gallery_Video;?> { overflow:auto; -webkit-overflow-scrolling: touch; }
					#cboxTitle<?php echo $Total_Soft_Gallery_Video;?> { margin:0; }
					#cboxLoadingOverlay<?php echo $Total_Soft_Gallery_Video;?>, #cboxLoadingGraphic<?php echo $Total_Soft_Gallery_Video;?>
					{
						position:absolute;
						top:0;
						left:0;
						width:100%;
						height:100%;
					}
					#cboxPrevious<?php echo $Total_Soft_Gallery_Video;?>, #cboxNext<?php echo $Total_Soft_Gallery_Video;?>, #cboxClose<?php echo $Total_Soft_Gallery_Video;?>, #cboxSlideshow<?php echo $Total_Soft_Gallery_Video;?>
					{
						cursor:pointer;
					}
					.cboxPhoto<?php echo $Total_Soft_Gallery_Video;?> { float:left; margin:auto; border:0; display:block; max-width:none; -ms-interpolation-mode:bicubic; }
					.cboxIframe<?php echo $Total_Soft_Gallery_Video;?> { width:100%; height:100%; display:block; border:0; padding:0; margin:0; }
					#colorbox<?php echo $Total_Soft_Gallery_Video;?>, #cboxContent<?php echo $Total_Soft_Gallery_Video;?>, #cboxLoadedContent<?php echo $Total_Soft_Gallery_Video;?>
					{
						box-sizing:content-box;
						-moz-box-sizing:content-box;
						-webkit-box-sizing:content-box;
					}
					#cboxOverlay<?php echo $Total_Soft_Gallery_Video;?> { background:rgba(0,0,0,0.7); }
					#colorbox<?php echo $Total_Soft_Gallery_Video;?> { outline:0; }
					#cboxTopLeft<?php echo $Total_Soft_Gallery_Video;?> { width:0px; height:0px; background:#fff;display:none; }
					#cboxTopRight<?php echo $Total_Soft_Gallery_Video;?> { width:0px; height:0px; background:#fff;display:none; }
					#cboxBottomLeft<?php echo $Total_Soft_Gallery_Video;?> { width:0px; height:0px; background:#fff;display:none; }
					#cboxBottomRight<?php echo $Total_Soft_Gallery_Video;?> { width:0px; height:0px; background:#fff;display:none; }
					#cboxMiddleLeft<?php echo $Total_Soft_Gallery_Video;?> { width:0px; background:#fff;display:none; }
					#cboxMiddleRight<?php echo $Total_Soft_Gallery_Video;?> { width:0px; background:#fff;display:none; }
					#cboxTopCenter<?php echo $Total_Soft_Gallery_Video;?> { height:0px; background:#fff;display:none; }
					#cboxBottomCenter<?php echo $Total_Soft_Gallery_Video;?> { height:0px; background:#fff;display:none; }
					#cboxContent<?php echo $Total_Soft_Gallery_Video;?> { background:#fff; overflow:visible;border:15px solid red;border-radius:5px; }
					.cboxIframe<?php echo $Total_Soft_Gallery_Video;?> { background:#fff; }
					#cboxError { padding:50px; border:1px solid #ccc; }
					#cboxLoadedContent<?php echo $Total_Soft_Gallery_Video;?> {/* margin-bottom:28px;*/margin-top:0px !important; }
					#cboxTitle<?php echo $Total_Soft_Gallery_Video;?> { position:relative; top:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32; ?>px; left:0; text-align:center; width:100%; color:#949494; }
					#cboxCurrent { position:absolute; bottom:4px; left:58px; color:#949494; }
					/* these elements are buttons, and may need to have additional styles reset to avoid unwanted base styles */
					#cboxPrevious<?php echo $Total_Soft_Gallery_Video;?>, #cboxNext<?php echo $Total_Soft_Gallery_Video;?>, #cboxSlideshow<?php echo $Total_Soft_Gallery_Video;?>, #cboxClose<?php echo $Total_Soft_Gallery_Video;?> 
					{
						border:0;
						padding:0;
						margin:0;
						overflow:visible;
						width:auto;
						background:none;
					}
					/* avoid outlines on :active (mouseclick), but preserve outlines on :focus (tabbed navigating) */
					#cboxPrevious<?php echo $Total_Soft_Gallery_Video;?>:active, #cboxNext<?php echo $Total_Soft_Gallery_Video;?>:active, #cboxSlideshow<?php echo $Total_Soft_Gallery_Video;?>:active, #cboxClose<?php echo $Total_Soft_Gallery_Video;?>:active { outline:0; }
					#cboxSlideshow<?php echo $Total_Soft_Gallery_Video;?> { position:absolute; bottom:4px; right:30px; color:#0092ef; }
					#cboxPrevious<?php echo $Total_Soft_Gallery_Video;?> { position:absolute; top:calc(100% + <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>px); left:0; font-size:25px;opacity:0.7;color:red; display:inline !important; }
					#cboxPrevious<?php echo $Total_Soft_Gallery_Video;?>:hover { opacity:1; }
					#cboxNext<?php echo $Total_Soft_Gallery_Video;?> { position:absolute; top:calc(100% + <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>px); left:27px;font-size:25px;color:red;opacity:0.7; display:inline !important; }
					#cboxNext<?php echo $Total_Soft_Gallery_Video;?>:hover { opacity:1; }
					#cboxClose<?php echo $Total_Soft_Gallery_Video;?> { position:absolute; top:calc(100% + <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>px); right:0;color:red;font-size:25px;opacity:0.7; }
					#cboxClose<?php echo $Total_Soft_Gallery_Video;?>:hover { opacity:1; }
					.cboxIE #cboxTopLeft<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxTopCenter<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxTopRight<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxBottomLeft<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxBottomCenter<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxBottomRight<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxMiddleLeft<?php echo $Total_Soft_Gallery_Video;?>, .cboxIE #cboxMiddleRight<?php echo $Total_Soft_Gallery_Video;?> 
					{
					    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF);
					}
					/*swipebox*/
					html.swipebox<?php echo $Total_Soft_Gallery_Video;?> { overflow: hidden!important; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay img { border: none!important; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay 
					{
						width: 100%;
						height: 100%;
						position: fixed;
						top: 0;
						left: 0;
						z-index: 99999!important;
						overflow: hidden;
						-webkit-user-select: none;
						-moz-user-select: none;
						user-select: none;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider { height: 100%; left: 0; top: 0; width: 100%; white-space: nowrap; position: absolute; display: none; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide 
					{
						background: url("../Images/loading.gif") no-repeat center center;
						height: 100%;
						width: 100%;
						text-align: center;
						display: inline-block;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide:before { content: ""; display: inline-block; height: 50%; width: 1px; margin-right: -1px; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide img, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-container 
					{
						display: inline-block;
						max-height: 100%;
						max-width: 100%;
						margin: 0;
						padding: 0;
						width: auto;
						height: auto;
						vertical-align: middle;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-container 
					{
						background:none;
						max-width: 1140px;
						max-height: 100%;
						width: 100%;
						padding:5%;
						box-sizing: border-box;
						-webkit-box-sizing: border-box;
						-moz-box-sizing: border-box;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-container .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video
					{
						width: 100%;
						height: 0;
						padding-bottom: 56.25%;
						overflow: hidden;
						position: relative;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-container .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video iframe
					{
						width: 100.5% !important; 
						height: 100.5% !important;
						position: absolute;
						top: 0;
						left: 0;
						background: #ffffff;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption 
					{
						position: absolute;
						left: 0;
						z-index: 999;
						height: 50px;
						width: 100%;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action { bottom: -50px; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action.visible-bars { bottom: 0; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action.force-visible-bars { bottom: 0!important; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption { top: -50px; text-align: center; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption.visible-bars { top: 0; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption.force-visible-bars { top: 0!important; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-close 
					{
						border: none!important;
						text-decoration: none!important;
						cursor: pointer;
						position: absolute;
						font-size:25px;
						color:#fff;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						-moz-transform:translateY(-50%);
						-o-transform:translateY(-50%);
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-close { background-position: 15px 12px; left: 40px; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev { background-position: -32px 13px; right: 100px; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next { background-position: -78px 13px; right: 40px; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev.disabled, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next.disabled 
					{
						filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=30);
						opacity: 0.3;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider.rightSpring { animation: rightSpring 0.3s; -moz-animation: rightSpring 0.3s; -webkit-animation: rightSpring 0.3s; }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider.leftSpring { animation: leftSpring 0.3s; -moz-animation: leftSpring 0.3s; -webkit-animation: leftSpring 0.3s; }
					@keyframes rightSpring { 0% { margin-left: 0px; } 50% { margin-left: -30px; } 100% { margin-left: 0px; } }
					@keyframes leftSpring { 0% { margin-left: 0px; } 50% { margin-left: 30px; } 100% { margin-left: 0px; } }
					@-moz-keyframes rightSpring { 0% { margin-left: 0px; } 50% { margin-left: -30px; } 100% { margin-left: 0px; } }
					@-moz-keyframes leftSpring { 0% { margin-left: 0px; } 50% { margin-left: 30px; } 100% { margin-left: 0px; } }
					@-webkit-keyframes rightSpring { 0% { margin-left: 0px; } 50% { margin-left: -30px; } 100% { margin-left: 0px; } }
					@-webkit-keyframes leftSpring { 0% { margin-left: 0px; } 50% { margin-left: 30px; } 100% { margin-left: 0px; } }
					@media screen and (max-width: 800px) 
					{
						#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-close { left: 0; }
						#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev { right: 60px; }
						#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next { right: 0; }
					}
					/* Skin -------------------------*/
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay { background:rgba(0,0,0,0.7); }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption 
					{
						text-shadow: 1px 1px 1px black;
						background-color: #0d0d0d;
						background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #0d0d0d), color-stop(100%, #000000));
						background-image: -webkit-linear-gradient(#0d0d0d, #000000);
						background-image: -moz-linear-gradient(#0d0d0d, #000000);
						background-image: -o-linear-gradient(#0d0d0d, #000000);
						background-image: linear-gradient(#0d0d0d, #000000);
						filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=95);
						opacity: 0.95;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-action { border-top: 1px solid rgba(255, 255, 255, 0.2); }
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption { color: white!important; font-size: 15px; line-height: 43px; font-family: Helvetica, Arial, sans-serif; }
					.TotSoft_GV_Container { width:100%; text-align:center; }
					.TotSoft_GV_Container * { transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -webkit-transform: translate3d(0, 0, 0); perspective: 800px;}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> 
					{
						max-width:100%;
						border-radius:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03; ?>px !important;
						border:none !important;
						box-shadow:<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06 == 1){ ?>0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05; ?><?php }else{ ?>0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05; ?> <?php } ?> !important;
						position:relative !important;
						display:inline-block;
						overflow:hidden !important;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02; ?>px !important;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01; ?>px !important;
						margin:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08; ?>px !important;
						outline:none !important;
						perspective-origin:800px !important;
						-webkit-perspective-origin:800px !important;
						-ms-perspective-origin:800px !important;
						-moz-perspective-origin:800px !important;
						-o-perspective-origin:800px !important;
						transition:all 0s !important;
						-webkit-transition:all 0s !important;
						-ms-transition:all 0s !important;
						-moz-transition:all 0s !important;
						-o-transition:all 0s !important;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> img { width:100% !important; height:100% !important; }
					.TotalSoft_HovLine1
					{
						position:absolute;
						border:0px solid red;
						width:90%;
						height:90%;
						top:50%;
						left:50%;
						z-index:9999;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine2
					{
						position:absolute;
						border:0px solid red;
						opacity:0;
						width:85%;
						height:85%;
						top:50%;
						left:50%;
						z-index:9999;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
					}
					.TotalSoft_HovLine3
					{
						position:absolute;
						border:0px solid red;
						opacity:0;
						width:105%;
						height:105%;
						top:50%;
						left:50%;
						z-index:9999;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.3s cubic-bezier(1,2.5,0.3,1.8);
						-webkit-transition:all 0.3s cubic-bezier(1,2.5,0.3,1.8);
						-ms-transition:all 0.3s cubic-bezier(1,2.5,0.3,1.8);
						-moz-transition:all 0.3s cubic-bezier(1,2.5,0.3,1.8);
						-o-transition:all 0.3s cubic-bezier(1,2.5,0.3,1.8);
					}
					.TotalSoft_HovLine4
					{
						position:absolute;
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						opacity:0.5;
						width:100px;
						height:100px;
						border-radius:50%;
						top:100%;
						left:100%;
						z-index:9999;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-webkit-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-ms-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-moz-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-o-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
					}
					.TotalSoft_HovLine5
					{
						position:absolute;
						border:0px solid red;
						width:90%;
						height:90%;
						top:50%;
						left:50%;
						z-index:9999;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine6, .TotalSoft_HovLine7, .TotalSoft_HovLine8, .TotalSoft_HovLine9, .TotalSoft_HovLine10, .TotalSoft_HovLine11
					{
						position:absolute;
						border:0px solid red;
						width:90%;
						height:90%;
						top:50%;
						left:50%;
						z-index:9999;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine12
					{
						position:absolute;
						border:0px solid red;
						width:100%;
						height:100%;
						top:50%;
						left:50%;
						z-index:9999;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						box-sizing:border-box;
						-moz-box-sizing:border-box;
						-webkit-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine4_1, .TotalSoft_HovLine4_2, .TotalSoft_HovLine4_3, .TotalSoft_HovLine4_4 { width:0px !important; height:0px !important; }
					.TotalSoft_HovLine1_1, .TotalSoft_HovLine2_1, .TotalSoft_HovLine3_1, .TotalSoft_HovLine5_1 
					{
						position:absolute;
						width:100%;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						top:0px;
						left:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
					}
					.TotalSoft_HovLine1_2, .TotalSoft_HovLine2_2, .TotalSoft_HovLine3_2, .TotalSoft_HovLine5_2
					{
						position:absolute;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						height:100%;
						top:0px;
						right:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
					}
					.TotalSoft_HovLine1_3, .TotalSoft_HovLine2_3, .TotalSoft_HovLine3_3, .TotalSoft_HovLine5_3
					{
						position:absolute;
						width:100%;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						bottom:0px;
						right:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
					}
					.TotalSoft_HovLine1_4, .TotalSoft_HovLine2_4, .TotalSoft_HovLine3_4, .TotalSoft_HovLine5_4
					{
						position:absolute;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						height:100%;
						bottom:0px;
						left:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
					}
					.TotalSoft_HovLine6_1, .TotalSoft_HovLine8_1, .TotalSoft_HovLine9_1, .TotalSoft_HovLine12_1
					{
						position:absolute;
						width:0%;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						top:0px;
						left:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine6_2, .TotalSoft_HovLine8_2, .TotalSoft_HovLine9_2, .TotalSoft_HovLine12_2
					{
						position:absolute;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						height:0%;
						top:0px;
						right:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine6_3, .TotalSoft_HovLine8_3, .TotalSoft_HovLine9_3, .TotalSoft_HovLine12_3
					{
						position:absolute;
						width:0%;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						bottom:0px;
						right:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine6_4, .TotalSoft_HovLine8_4, .TotalSoft_HovLine9_4, .TotalSoft_HovLine12_4
					{
						position:absolute;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						height:0%;
						bottom:0px;
						left:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_HovLine7_1, .TotalSoft_HovLine10_1, .TotalSoft_HovLine11_1, .TotalSoft_HovLine13_1
					{
						position:absolute;
						width:0%;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						top:0px;
						left:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0.6s;
						-webkit-transition-delay:0.6s;
						-ms-transition-delay:0.6s;
						-moz-transition-delay:0.6s;
						-o-transition-delay:0.6s;
					}
					.TotalSoft_HovLine7_2, .TotalSoft_HovLine10_2, .TotalSoft_HovLine11_2, .TotalSoft_HovLine13_2
					{
						position:absolute;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						height:0%;
						top:0px;
						right:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.1s linear;
						-webkit-transition:all 0.1s linear;
						-ms-transition:all 0.1s linear;
						-moz-transition:all 0.1s linear;
						-o-transition:all 0.1s linear;
						transition-delay:0.5s;
						-webkit-transition-delay:0.5s;
						-ms-transition-delay:0.5s;
						-moz-transition-delay:0.5s;
						-o-transition-delay:0.5s;
					}
					.TotalSoft_HovLine7_3, .TotalSoft_HovLine10_3, .TotalSoft_HovLine11_3, .TotalSoft_HovLine13_3
					{
						position:absolute;
						width:0%;
						height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						bottom:0px;
						right:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.2s linear;
						-webkit-transition:all 0.2s linear;
						-ms-transition:all 0.2s linear;
						-moz-transition:all 0.2s linear;
						-o-transition:all 0.2s linear;
						transition-delay:0.3s;
						-webkit-transition-delay:0.3s;
						-ms-transition-delay:0.3s;
						-moz-transition-delay:0.3s;
						-o-transition-delay:0.3s;
					}
					.TotalSoft_HovLine7_4, .TotalSoft_HovLine10_4, .TotalSoft_HovLine11_4, .TotalSoft_HovLine13_4
					{
						position:absolute;
						width:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21; ?>px;
						height:0%;
						bottom:0px;
						left:0px;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22; ?>;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24; ?>;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0s;
						-webkit-transition-delay:0s;
						-ms-transition-delay:0s;
						-moz-transition-delay:0s;
						-o-transition-delay:0s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine1 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine5 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine6 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine7 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine8 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine9 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine10 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine11 { transition:all 0s linear; -moz-transition:all 0s linear; -webkit-transition:all 0s linear; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine2 { opacity:1; width:90%; height:90%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine3 { opacity:1; width:90%; height:90%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine4 { opacity:1; top:50%; left:50%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine6_1 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine6_2 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine6_3 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine6_4 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine8_1 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine8_2 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine8_3 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine8_4 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine9_1 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine9_2 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine9_3 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine9_4 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine12_1 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine12_2 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine12_3 { width:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine12_4 { height:100%; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine7_1
					{
						width:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0s;
						-webkit-transition-delay:0s;
						-ms-transition-delay:0s;
						-moz-transition-delay:0s;
						-o-transition-delay:0s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine7_2
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.2s linear;
						-ms-transition:all 0.2s linear;
						-moz-transition:all 0.2s linear;
						-o-transition:all 0.2s linear;
						transition-delay:0.3s;
						-webkit-transition-delay:0.3s;
						-ms-transition-delay:0.3s;
						-moz-transition-delay:0.3s;
						-o-transition-delay:0.3s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine7_3
					{
						width:100%;
						transition:all 0.1s linear;
						-webkit-transition:all 0.1s linear;
						-ms-transition:all 0.1s linear;
						-moz-transition:all 0.1s linear;
						-o-transition:all 0.1s linear;
						transition-delay:0.5s;
						-webkit-transition-delay:0.5s;
						-ms-transition-delay:0.5s;
						-moz-transition-delay:0.5s;
						-o-transition-delay:0.5s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine7_4
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0.6s;
						-webkit-transition-delay:0.6s;
						-ms-transition-delay:0.6s;
						-moz-transition-delay:0.6s;
						-o-transition-delay:0.6s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine10_1
					{
						width:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0s;
						-webkit-transition-delay:0s;
						-ms-transition-delay:0s;
						-moz-transition-delay:0s;
						-o-transition-delay:0s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine10_2
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.2s linear;
						-ms-transition:all 0.2s linear;
						-moz-transition:all 0.2s linear;
						-o-transition:all 0.2s linear;
						transition-delay:0.3s;
						-webkit-transition-delay:0.3s;
						-ms-transition-delay:0.3s;
						-moz-transition-delay:0.3s;
						-o-transition-delay:0.3s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine10_3
					{
						width:100%;
						transition:all 0.1s linear;
						-webkit-transition:all 0.1s linear;
						-ms-transition:all 0.1s linear;
						-moz-transition:all 0.1s linear;
						-o-transition:all 0.1s linear;
						transition-delay:0.5s;
						-webkit-transition-delay:0.5s;
						-ms-transition-delay:0.5s;
						-moz-transition-delay:0.5s;
						-o-transition-delay:0.5s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine10_4
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0.6s;
						-webkit-transition-delay:0.6s;
						-ms-transition-delay:0.6s;
						-moz-transition-delay:0.6s;
						-o-transition-delay:0.6s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine11_1
					{
						width:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0s;
						-webkit-transition-delay:0s;
						-ms-transition-delay:0s;
						-moz-transition-delay:0s;
						-o-transition-delay:0s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine11_2
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.2s linear;
						-ms-transition:all 0.2s linear;
						-moz-transition:all 0.2s linear;
						-o-transition:all 0.2s linear;
						transition-delay:0.3s;
						-webkit-transition-delay:0.3s;
						-ms-transition-delay:0.3s;
						-moz-transition-delay:0.3s;
						-o-transition-delay:0.3s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine11_3
					{
						width:100%;
						transition:all 0.1s linear;
						-webkit-transition:all 0.1s linear;
						-ms-transition:all 0.1s linear;
						-moz-transition:all 0.1s linear;
						-o-transition:all 0.1s linear;
						transition-delay:0.5s;
						-webkit-transition-delay:0.5s;
						-ms-transition-delay:0.5s;
						-moz-transition-delay:0.5s;
						-o-transition-delay:0.5s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine11_4
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0.6s;
						-webkit-transition-delay:0.6s;
						-ms-transition-delay:0.6s;
						-moz-transition-delay:0.6s;
						-o-transition-delay:0.6s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine13_1
					{
						width:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0s;
						-webkit-transition-delay:0s;
						-ms-transition-delay:0s;
						-moz-transition-delay:0s;
						-o-transition-delay:0s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine13_2
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.2s linear;
						-ms-transition:all 0.2s linear;
						-moz-transition:all 0.2s linear;
						-o-transition:all 0.2s linear;
						transition-delay:0.3s;
						-webkit-transition-delay:0.3s;
						-ms-transition-delay:0.3s;
						-moz-transition-delay:0.3s;
						-o-transition-delay:0.3s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine13_3
					{
						width:100%;
						transition:all 0.1s linear;
						-webkit-transition:all 0.1s linear;
						-ms-transition:all 0.1s linear;
						-moz-transition:all 0.1s linear;
						-o-transition:all 0.1s linear;
						transition-delay:0.5s;
						-webkit-transition-delay:0.5s;
						-ms-transition-delay:0.5s;
						-moz-transition-delay:0.5s;
						-o-transition-delay:0.5s;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_HovLine13_4
					{
						height:100%;
						transition:all 0.3s linear;
						-webkit-transition:all 0.3s linear;
						-ms-transition:all 0.3s linear;
						-moz-transition:all 0.3s linear;
						-o-transition:all 0.3s linear;
						transition-delay:0.6s;
						-webkit-transition-delay:0.6s;
						-ms-transition-delay:0.6s;
						-moz-transition-delay:0.6s;
						-o-transition-delay:0.6s;
					}
					.TotalSoft_Title_Ef
					{
						perspective: 800px;
					}
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12!="0"){ ?>
						.TotalSoft_Title_Ef1,.TotalSoft_Title_Ef2,.TotalSoft_Title_Ef3,.TotalSoft_Title_Ef4
						{
							text-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?> !important;
						}
					<?php }?>
					.TotalSoft_Title_Ef1
					{
						position:absolute;
						z-index:9999;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11; ?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09; ?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10; ?> !important;
						font-weight:800 !important;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-webkit-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-ms-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-moz-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-o-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-webkit-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-ms-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-moz-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-o-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
					}
					.TotalSoft_Title_Ef2
					{
						position:absolute;
						z-index:9999;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11; ?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09; ?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10; ?> !important;
						font-weight:800 !important;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%) scale(0,0) translate3d(0, 0, 0);
						-webkit-transform:translateY(-50%) translateX(-50%) scale(0,0) translate3d(0, 0, 0);
						-ms-transform:translateY(-50%) translateX(-50%) scale(0,0) translate3d(0, 0, 0);
						-moz-transform:translateY(-50%) translateX(-50%) scale(0,0) translate3d(0, 0, 0);
						-o-transform:translateY(-50%) translateX(-50%) scale(0,0) translate3d(0, 0, 0);
						transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-webkit-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-ms-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-moz-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
						-o-transition:transform 0.4s cubic-bezier(1,1.5,0.3,1.8);
					}
					.TotalSoft_Title_Ef3
					{
						position:absolute;
						z-index:9999;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11; ?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09; ?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10; ?> !important;
						font-weight:800 !important;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-webkit-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-ms-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-moz-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-o-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
					}
					.TotalSoft_Title_Ef4
					{
						position:absolute;
						z-index:9999;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11; ?> !important;
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09; ?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10; ?> !important;
						font-weight:800 !important;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-webkit-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-ms-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-moz-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						-o-transform:translateY(-50%) translateX(-50%) translate3d(0, 0, 0);
						transition:transform 0.4s linear;
						-webkit-transition:transform 0.4s linear;
						-ms-transition:transform 0.4s linear;
						-moz-transition:transform 0.4s linear;
						-o-transition:transform 0.4s linear;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Title_Ef1
					{
						transition:transform 0s linear;
						-moz-transition:transform 0s linear;
						-webkit-transition:transform 0s linear;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Title_Ef2
					{
						transform:translateY(-50%) translateX(-50%) scale(1,1) translate3d(0, 0, 0);
						-moz-transform:translateY(-50%) translateX(-50%) scale(1,1) translate3d(0, 0, 0);
						-webkit-transform:translateY(-50%) translateX(-50%) scale(1,1) translate3d(0, 0, 0);
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Title_Ef4
					{
						transition:transform 0s linear;
						-moz-transition:transform 0s linear;
						-webkit-transition:transform 0s linear;
					}
					.TotalSoft_Hov_Overlay1
					{
						position:absolute;
						width:0%;
						height:0%;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25; ?> !important;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_Hov_Overlay2
					{
						position:absolute;
						width:100%;
						height:100%;
						top:0%;
						left:0%;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_Hov_Overlay3
					{
						position:absolute;
						width:0%;
						height:0%;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_Hov_Overlay4
					{
						position:absolute;
						width:100%;
						height:100%;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25; ?>;
						opacity:0 !important;
						transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-webkit-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-ms-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-moz-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
						-o-transition:all 0.4s cubic-bezier(1,2.5,0.3,1.8);
					}
					.TotalSoft_Hov_Overlay5
					{
						position:absolute;
						width:100%;
						height:100%;
						top:0%;
						left:0%;
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25; ?>;
						transition:all 0.4s linear;
						-webkit-transition:all 0.4s linear;
						-ms-transition:all 0.4s linear;
						-moz-transition:all 0.4s linear;
						-o-transition:all 0.4s linear;
					}
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Hov_Overlay1 { width:90% !important; height:90% !important; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Hov_Overlay3 { width:100% !important; height:100% !important; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Hov_Overlay4 { opacity:0.8 !important; }
					.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_Hov_Overlay5 { opacity:0 !important; }
					.line_TotalSoft
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20=='true') { ?>
							display:block !important;
						<?php }else{?>
							display:none !important;
						<?php } ?>
					}
					.Ov_TotalSoft
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27=='true') { ?>
							display:block !important;
						<?php }else{?>
							display:none !important;
						<?php } ?>
					}
					.TotalSoft_PI
					{
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17; ?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18; ?> !important;
					}
					#cboxOverlay<?php echo $Total_Soft_Gallery_Video;?>, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-overlay 
					{
					    background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28; ?> !important;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption
					{
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31; ?> !important;
						opacity:1 !important;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide img, #cboxContent<?php echo $Total_Soft_Gallery_Video;?>, .swipebox<?php echo $Total_Soft_Gallery_Video;?>-video
					{
						border:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32; ?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33; ?> !important;
						box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35; ?> !important;
						-moz-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35; ?> !important;
						-webkit-box-shadow:0px 0px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34; ?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35; ?> !important;
						box-sizing: border-box;
						-moz-box-sizing: border-box;
						-webkit-box-sizing: border-box;
					}
					#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide img
					{
						box-sizing:border-box !important;
						-moz-box-sizing:border-box !important;
						-webkit-box-sizing:border-box !important;
						margin-top:0px !important;
					}
					#cboxContent<?php echo $Total_Soft_Gallery_Video;?>, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-action
					{
						background:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36; ?> !important;
						opacity:1 !important;
					}
					#colorbox<?php echo $Total_Soft_Gallery_Video;?>, #cboxOverlay<?php echo $Total_Soft_Gallery_Video;?>, #cboxWrapper<?php echo $Total_Soft_Gallery_Video;?>
					{
						overflow:visible !important;
						max-width:100% !important;
					}
					#cboxContent<?php echo $Total_Soft_Gallery_Video;?>
					{
						max-width:calc(100% - <?php echo 2*$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32; ?>px);
					}
					#cboxTitle<?php echo $Total_Soft_Gallery_Video;?>, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-caption
					{
						font-size:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37; ?>px !important;
						font-family:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38; ?> !important;
						color:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39; ?> !important;
						bottom:0px !important;
					}
					#cboxTitle<?php echo $Total_Soft_Gallery_Video;?>
					{
						line-height:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37+8; ?>px !important;
					}
					#cboxNext<?php echo $Total_Soft_Gallery_Video;?>,#cboxPrevious<?php echo $Total_Soft_Gallery_Video;?>,#cboxClose<?php echo $Total_Soft_Gallery_Video;?>, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-close, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-prev, #swipebox<?php echo $Total_Soft_Gallery_Video;?>-next
					{
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01; ?>px !important;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02; ?> !important;
					}
					<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05 == '1'){ ?>
						#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide, #cboxLoadedContent<?php echo $Total_Soft_Gallery_Video;?> 
						{
							background: url("<?php echo plugins_url('../Images/loading1.gif',__FILE__);?>") no-repeat center center !important;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05 == '2'){ ?>
						#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide, #cboxLoadedContent<?php echo $Total_Soft_Gallery_Video;?> 
						{
							background: url("<?php echo plugins_url('../Images/loading2.gif',__FILE__);?>") no-repeat center center !important;
						}
					<?php }else{ ?>
						#swipebox<?php echo $Total_Soft_Gallery_Video;?>-slider .slide, #cboxLoadedContent<?php echo $Total_Soft_Gallery_Video;?> 
						{
							background: url("<?php echo plugins_url('../Images/loading.gif',__FILE__);?>") no-repeat center center !important;
						}
					<?php } ?>
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li { border:none !important; list-style:none !important; }
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span 
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						height:auto !important;
						line-height: 1 !important;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09!='none'){ ?> 
							border: 1px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?> !important;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						display:block;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span:hover:not(.active) 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
					}
					ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span.active 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
					}
					.TotalSoftGV_PE_LM<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>px;
						font-family:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09!='none'){ ?> 
							border: 1px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?> <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>;
						<?php } else { ?>
							border: none !important;
						<?php }?>
						cursor:pointer;
						display: block;
						padding: 3px !important;
						line-height: 1 !important;
					}
					.TotalSoftGV_PE_LM<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
					}
					@media screen and (max-width:820px)
					{
						ul.pagination<?php echo $Total_Soft_Gallery_Video;?> li span { cursor:default; }
						.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>
						{
							margin:<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08; ?>px 0 !important;
						}
					}
					.TotSoft_GV_Container_<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
				</style>
				<div class="TotSoft_GV_Container TotSoft_GV_Container_<?php echo $Total_Soft_Gallery_Video;?> myExMul" id="swipeboxVideo_Totsoft">
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29==1) { ?>
								<a id="TotalSoft_GV_PE_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?> swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" name="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
									<img class="TotalSoft_HZ2" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
									<span style="display:inline-block;" class="TotalSoft_Title_Ef <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>">
										<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15=='true') { ?>
											<br /><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16; ?> TotalSoft_PI"></i>
										<?php } ?>
									</span>
									<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?> line_TotalSoft">
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_1"></div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_2"></div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_3"></div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_4"></div>
									</div>
									<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?> Ov_TotalSoft"></div>
								</a>
							<?php }else{ ?>
								<a id="TotalSoft_GV_PE_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?> swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" name="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
									<img class="TotalSoft_HZ2" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
									<span style="display:inline-block;" class="TotalSoft_Title_Ef <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>">
										<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15=='true') { ?>
										<br /><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16; ?> TotalSoft_PI"></i>
										<?php } ?>
									</span>
									<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?> line_TotalSoft">
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_1"></div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_2"></div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_3"></div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_4"></div>
									</div>
									<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?> Ov_TotalSoft"></div>
								</a>
							<?php } ?>
						<?php }else{ ?>
							<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
								<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29==1) { ?>
									<a id="TotalSoft_GV_PE_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?> swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" name="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
										<img class="TotalSoft_HZ2" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<span style="display:inline-block;" class="TotalSoft_Title_Ef <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>">
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15=='true') { ?>
											<br /><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16; ?> TotalSoft_PI"></i>
											<?php } ?>
										</span>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?> line_TotalSoft">
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_1"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_2"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_3"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_4"></div>
										</div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?> Ov_TotalSoft"></div>
									</a>
								<?php }else{?>
									<a id="TotalSoft_GV_PE_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" class="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?> swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" name="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
										<img class="TotalSoft_HZ2" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<span style="display:inline-block;" class="TotalSoft_Title_Ef <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>">
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15=='true') { ?>
											<br /><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16; ?> TotalSoft_PI"></i>
											<?php } ?>
										</span>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?> line_TotalSoft">
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_1"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_2"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_3"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_4"></div>
										</div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?> Ov_TotalSoft"></div>
									</a>
								<?php } ?>
							<?php }else{ ?>
								<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29==1) { ?>
									<a id="TotalSoft_GV_PE_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" style="display:none;" class="noshow1 TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?> swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_Video;?>" name="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
										<img class="TotalSoft_HZ2" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<span style="display:inline-block;" class="TotalSoft_Title_Ef <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>">
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15=='true') { ?>
											<br /><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16; ?> TotalSoft_PI"></i>
											<?php } ?>
										</span>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?> line_TotalSoft">
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_1"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_2"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_3"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_4"></div>
										</div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?> Ov_TotalSoft"></div>
									</a>
								<?php }else{ ?>
									<a id="TotalSoft_GV_PE_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" style="display:none;" class="noshow1 TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?> swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" name="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>">
										<img class="TotalSoft_HZ2" alt="<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" />
										<span style="display:inline-block;" class="TotalSoft_Title_Ef <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>">
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15==1 || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15=='true') { ?>
											<br /><i class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16; ?> TotalSoft_PI"></i>
											<?php } ?>
										</span>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?> line_TotalSoft">
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_1"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_2"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_3"></div>
											<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>_4"></div>
										</div>
										<div class="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?> Ov_TotalSoft"></div>
									</a>
					<?php } } } }?>
				</div>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
					<div class="TotalSoftcenter">
						<ul class="pagination pagination<?php echo $Total_Soft_Gallery_Video;?>" style='margin:0px;padding:0px;'>
							<li onclick="Total_Soft_GV_PE_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?></span></li>
							<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
								<?php if($i==1){ ?>
									<li id="TotalSoft_GV_PE_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_PE_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span class="active"><?php echo $i;?></span></li>
									<?php } else { ?>
									<li id="TotalSoft_GV_PE_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_PE_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')"><span><?php echo $i;?></span></li>
									<?php }?>
							<?php }?>
								<li onclick="Total_Soft_GV_PE_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><span><?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?></span></li>
						</ul>
					</div>
				<?php }?>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
					<div class="TotalSoftcenter" id="TotalSoft_VG_PE_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
						<span class="TotalSoftGV_PE_LM TotalSoftGV_PE_LM<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_PE_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')"><?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?></span>
						<input type="text" style="display:none;" id="TotalSoft_VG_PE_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
					</div>
				<?php } ?>
				<input type="text" style="display:none;" class="TotalSoft_JGV_P_T<?php echo $Total_Soft_Gallery_Video; ?>" value="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29; ?>">
				<input type="text" style="display:none;" class="TotalSoft_PS_Left_Icon" value="<?php echo $TotalSoft_PS_Left_Icon; ?>">
				<input type="text" style="display:none;" class="TotalSoft_PS_Right_Icon" value="<?php echo $TotalSoft_PS_Right_Icon; ?>">
				<input type="text" style="display:none;" class="TotalSoft_JGV_PS_DIcT" value="<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04; ?>">
				<input type="text" style="display:none;" class="TotalSoft_JGV_P1S_ET<?php echo $Total_Soft_Gallery_Video; ?>" value="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30; ?>">
				<input type='text' style="display:none;" class="TS_VG_PE_AE_<?php echo $Total_Soft_Gallery_Video;?>" value="<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18;?>">
				<script>
					jQuery(document).ready(function(){
						var TotalSoft_JGV_P_T<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.TotalSoft_JGV_P_T<?php echo $Total_Soft_Gallery_Video; ?>').val();
							TotalSoft_JGV_P1S_ET<?php echo $Total_Soft_Gallery_Video; ?> = jQuery('.TotalSoft_JGV_P1S_ET<?php echo $Total_Soft_Gallery_Video; ?>').val();
						if(TotalSoft_JGV_P_T<?php echo $Total_Soft_Gallery_Video; ?>==1)
						{
							jQuery('.swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>').swipebox<?php echo $Total_Soft_Gallery_Video;?>();
						}
						else
						{
							jQuery('.swipebox<?php echo $Total_Soft_Gallery_Video;?>-video-TotSoft<?php echo $Total_Soft_Gallery_Video; ?>').colorbox<?php echo $Total_Soft_Gallery_Video;?>({iframe:true,transition:TotalSoft_JGV_P1S_ET<?php echo $Total_Soft_Gallery_Video; ?>,innerWidth:jQuery(window).width()*0.7,innerHeight:jQuery(window).width()*0.7*0.6,maxWidth : "80%",maxHeight : "80%",current : "",rel:'slideshow', slideshow:false});
						}

						var delaytime = 0;
						var TS_VG_PE_AE = jQuery('.TS_VG_PE_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();

						jQuery('.TotSoft_GV_Container_<?php echo $Total_Soft_Gallery_Video;?> a.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_PE_AE == '')
								{
									jQuery(this).css({'display':'inline-block','opacity':'1'});
								}
								else if(TS_VG_PE_AE == 'fadeIn')
								{
									jQuery(this).css({'display':'inline-block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'moveUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'scaleUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'fallPerspective')
								{
									jQuery(this).css({'display':'inline-block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'fly')
								{
									jQuery(this).css({'display':'inline-block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'flip')
								{
									jQuery(this).css({'display':'inline-block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'helix')
								{
									jQuery(this).css({'display':'inline-block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_PE_AE == 'popUp')
								{
									jQuery(this).css({'display':'inline-block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
					function TotalSoft_Hov_Anim(event){
						var img="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07; ?>";
						var title="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14; ?>";
						var line="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19; ?>";
						var overlay="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26; ?>"
						jQuery('.TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							jQuery(this).on('hover',function(){
							},function(){
								if(img=="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>1")
								{
									jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>1").css({"transform":"translateY(-50%) translateX(-50%)","-webkit-transform":"translateY(-50%) translateX(-50%)","-ms-transform":"translateY(-50%) translateX(-50%)","-moz-transform":"translateY(-50%) translateX(-50%)","-o-transform":"translateY(-50%) translateX(-50%)",})
									// jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>").css({"transform":"rotateX(0deg) rotateY(0deg)","-webkit-transform":"rotateX(0deg) rotateY(0deg)","-ms-transform":"rotateX(0deg) rotateY(0deg)","-moz-transform":"rotateX(0deg) rotateY(0deg)","-o-transform":"rotateX(0deg) rotateY(0deg)"});
								}
								else if(img=="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>2")
								{
									jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>2").css({"transform":"translateY(-50%) translateX(-50%)","-webkit-transform":"translateY(-50%) translateX(-50%)","-ms-transform":"translateY(-50%) translateX(-50%)","-moz-transform":"translateY(-50%) translateX(-50%)","-o-transform":"translateY(-50%) translateX(-50%)",})
									// jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>").css({"transform":"rotateX(0deg) rotateY(0deg)","-webkit-transform":"rotateX(0deg) rotateY(0deg)","-ms-transform":"rotateX(0deg) rotateY(0deg)","-moz-transform":"rotateX(0deg) rotateY(0deg)","-o-transform":"rotateX(0deg) rotateY(0deg)"});
								}
								if(line=="TotalSoft_HovLine1")
								{
									jQuery(".TotalSoft_HovLine1").css({"transform":"translateY(-50%) translateX(-50%)","-webkit-transform":"translateY(-50%) translateX(-50%)","-ms-transform":"translateY(-50%) translateX(-50%)","-moz-transform":"translateY(-50%) translateX(-50%)","-o-transform":"translateY(-50%) translateX(-50%)",})
									// jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>").css({"transform":"rotateX(0deg) rotateY(0deg)","-webkit-transform":"rotateX(0deg) rotateY(0deg)","-ms-transform":"rotateX(0deg) rotateY(0deg)","-moz-transform":"rotateX(0deg) rotateY(0deg)","-o-transform":"rotateX(0deg) rotateY(0deg)"});
								}
								else if(line=="TotalSoft_HovLine5")
								{
									jQuery(".TotalSoft_HovLine5").css({"transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-webkit-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-ms-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-moz-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-o-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)"})
								}
								else if(line=="TotalSoft_HovLine8")
								{
									jQuery(".TotalSoft_HovLine8").css({"transform":"translateY(-50%) translateX(-50%)","-webkit-transform":"translateY(-50%) translateX(-50%)","-ms-transform":"translateY(-50%) translateX(-50%)","-moz-transform":"translateY(-50%) translateX(-50%)","-o-transform":"translateY(-50%) translateX(-50%)",})
									// jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>").css({"transform":"rotateX(0deg) rotateY(0deg)","-webkit-transform":"rotateX(0deg) rotateY(0deg)","-ms-transform":"rotateX(0deg) rotateY(0deg)","-moz-transform":"rotateX(0deg) rotateY(0deg)","-o-transform":"rotateX(0deg) rotateY(0deg)"});
								}
								else if(line=="TotalSoft_HovLine9")
								{
									jQuery(".TotalSoft_HovLine9").css({"transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-webkit-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-ms-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-moz-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-o-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)"})
								}
								else if(line=="TotalSoft_HovLine10")
								{
									jQuery(".TotalSoft_HovLine10").css({"transform":"translateY(-50%) translateX(-50%)","-webkit-transform":"translateY(-50%) translateX(-50%)","-ms-transform":"translateY(-50%) translateX(-50%)","-moz-transform":"translateY(-50%) translateX(-50%)","-o-transform":"translateY(-50%) translateX(-50%)",})
									// jQuery(".TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>").css({"transform":"rotateX(0deg) rotateY(0deg)","-webkit-transform":"rotateX(0deg) rotateY(0deg)","-ms-transform":"rotateX(0deg) rotateY(0deg)","-moz-transform":"rotateX(0deg) rotateY(0deg)","-o-transform":"rotateX(0deg) rotateY(0deg)"});
								}
								else if(line=="TotalSoft_HovLine11")
								{
									jQuery(".TotalSoft_HovLine11").css({"transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-webkit-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-ms-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-moz-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)","-o-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%)"})
								}
								if(title=="TotalSoft_Title_Ef1")
								{
									jQuery(".TotalSoft_Title_Ef1").css({"transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-webkit-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-ms-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-moz-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-o-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)"})
								}
								else if(title=="TotalSoft_Title_Ef4")
								{
									jQuery(".TotalSoft_Title_Ef4").css({"transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-webkit-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-ms-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-moz-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-o-transform":"rotateX(0deg) rotateY(0deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)"})
								}
							})
							jQuery(this).mousemove(function(event){
								event = event || window.event
								if(line=="TotalSoft_HovLine1")
								{
									jQuery(this).find(".TotalSoft_HovLine1").css({"transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine1").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine1").offset().left)/10-jQuery(this).width()/2))+"px)","-webkit-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine1").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine1").offset().left)/10-jQuery(this).width()/2))+"px)","-ms-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine1").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine1").offset().left)/10-jQuery(this).width()/2))+"px)","-moz-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine1").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine1").offset().left)/10-jQuery(this).width()/2))+"px)","-o-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine1").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine1").offset().left)/10-jQuery(this).width()/2))+"px)"})
								}
								else if(line=="TotalSoft_HovLine5")
								{
									jQuery(this).find(".TotalSoft_HovLine5").css({"transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-webkit-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-ms-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-moz-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-o-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)"})
								}
								else if(line=="TotalSoft_HovLine8")
								{
									jQuery(this).find(".TotalSoft_HovLine8").css({"transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine8").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine8").offset().left)/10-jQuery(this).width()/2))+"px)","-webkit-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine8").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine8").offset().left)/10-jQuery(this).width()/2))+"px)","-ms-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine8").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine8").offset().left)/10-jQuery(this).width()/2))+"px)","-moz-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine8").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine8").offset().left)/10-jQuery(this).width()/2))+"px)","-o-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine8").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine8").offset().left)/10-jQuery(this).width()/2))+"px)"})
								}
								else if(line=="TotalSoft_HovLine9")
								{
									jQuery(this).find(".TotalSoft_HovLine9").css({"transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-webkit-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-ms-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-moz-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-o-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)"})
								}
								else if(line=="TotalSoft_HovLine10")
								{
									jQuery(this).find(".TotalSoft_HovLine10").css({"transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine10").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine10").offset().left)/10-jQuery(this).width()/2))+"px)","-webkit-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine10").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine10").offset().left)/10-jQuery(this).width()/2))+"px)","-ms-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine10").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine10").offset().left)/10-jQuery(this).width()/2))+"px)","-moz-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine10").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine10").offset().left)/10-jQuery(this).width()/2))+"px)","-o-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_HovLine10").offset().top)/10-jQuery(this).height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_HovLine10").offset().left)/10-jQuery(this).width()/2))+"px)"})
								}
								else if(line=="TotalSoft_HovLine11")
								{
									jQuery(this).find(".TotalSoft_HovLine11").css({"transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-webkit-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-ms-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-moz-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)","-o-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg) translateY(-50%) translateX(-50%)"})
								}
								if(img=="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>1")
								{
									jQuery(this).css({"transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg)","-webkit-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg)","-ms-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg)","-moz-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg)","-o-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/15)+"deg)"})
								}
								else if(img=="TotalSoft_H_Ef<?php echo $Total_Soft_Gallery_Video;?>2")
								{
									jQuery(this).css({"transform":"translateY("+Math.floor(((event.pageY-jQuery(this).offset().top-jQuery(this).height()/2)/15))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15))+"px)","-webkit-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).offset().top-jQuery(this).height()/2)/15))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15))+"px)","-ms-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).offset().top-jQuery(this).height()/2)/15))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15))+"px)","-moz-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).offset().top-jQuery(this).height()/2)/15))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15))+"px)","-o-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).offset().top-jQuery(this).height()/2)/15))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/15))+"px)"})
								}
								if(title=="TotalSoft_Title_Ef1")
								{
									jQuery(this).find(".TotalSoft_Title_Ef1").css({"transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_Title_Ef1").offset().top)/5-jQuery(this).find(".TotalSoft_Title_Ef1").height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef1").offset().left)/5-jQuery(this).find(".TotalSoft_Title_Ef1").width()/2))+"px) translate3d(0, 0, 0)","-webkit-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_Title_Ef1").offset().top)/5-jQuery(this).find(".TotalSoft_Title_Ef1").height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef1").offset().left)/5-jQuery(this).find(".TotalSoft_Title_Ef1").width()/2))+"px) translate3d(0, 0, 0)","-ms-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_Title_Ef1").offset().top)/5-jQuery(this).find(".TotalSoft_Title_Ef1").height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef1").offset().left)/5-jQuery(this).find(".TotalSoft_Title_Ef1").width()/2))+"px) translate3d(0, 0, 0)","-moz-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_Title_Ef1").offset().top)/5-jQuery(this).find(".TotalSoft_Title_Ef1").height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef1").offset().left)/5-jQuery(this).find(".TotalSoft_Title_Ef1").width()/2))+"px) translate3d(0, 0, 0)","-o-transform":"translateY("+Math.floor(((event.pageY-jQuery(this).find(".TotalSoft_Title_Ef1").offset().top)/5-jQuery(this).find(".TotalSoft_Title_Ef1").height()/2))+"px) translateX("+Math.floor(((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef1").offset().left)/5-jQuery(this).find(".TotalSoft_Title_Ef1").width()/2))+"px) translate3d(0, 0, 0)"})
								}
								else if(title=="TotalSoft_Title_Ef4")
								{
									jQuery(this).find(".TotalSoft_Title_Ef4").css({"transform":"rotateX("+Math.floor((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef4").offset().left-jQuery(this).find(".TotalSoft_Title_Ef4").width()/2)/10)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).find(".TotalSoft_Title_Ef4").offset().top+jQuery(this).find(".TotalSoft_Title_Ef4").height()/2)/10)+"deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-webkit-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).find(".TotalSoft_Title_Ef4").offset().left-jQuery(this).find(".TotalSoft_Title_Ef4").width()/2)/10)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/10)+"deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-ms-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/10)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/10)+"deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-moz-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/10)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/10)+"deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)","-o-transform":"rotateX("+Math.floor((event.pageX-jQuery(this).offset().left-jQuery(this).width()/2)/10)+"deg) rotateY("+Math.floor((event.pageY-jQuery(this).offset().top+jQuery(this).height()/2)/10)+"deg) translateY(-50%) translateX(-50%) translate3d(0, 0, 0)"})
								}
								if(overlay=="TotalSoft_Hov_Overlay1"){ }
							})
						})
					}
					TotalSoft_Hov_Anim();
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Classic Gallery'){ ?>
				<style type="text/css">
					.TS_GV_ClG_<?php echo $Total_Soft_Gallery_Video;?> *, .TS_GV_ClG_<?php echo $Total_Soft_Gallery_Video;?> *:before, .TS_GV_ClG_<?php echo $Total_Soft_Gallery_Video;?> *:after
					{
						box-sizing: border-box;
						-webkit-box-sizing: border-box;
						-moz-box-sizing: border-box;
					}
					.TS_GV_ClG_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: relative;
						width: 100%;
						text-align: center;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }?>
					}
					.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == '1'){ ?>
							width: calc(100% - 1em);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == '2'){ ?>
							width: calc(49% - 1em);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == '3'){ ?>
							width: calc(32.3% - 1em);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == '4'){ ?>
							width: calc(24% - 1em);
						<?php }else{ ?>
							width: calc(19% - 1em);
						<?php }?>
						display: inline-block;
						margin: 0 !important;
						padding: 0.5em;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08;?>;
						position:relative;
						z-index: 0;
						cursor: pointer;
						overflow: hidden;
						opacity: 0;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px);
							-moz-transform: translateY(200px);
							transform: translateY(200px);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6);
							-moz-transform: scale(0.6);
							transform: scale(0.6);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg);
							-moz-transform: rotateX(-180deg);
							transform: rotateX(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg);
							-moz-transform: rotateX(-80deg);
							transform: rotateX(-80deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg);
							-moz-transform: rotateY(-180deg);
							transform: rotateY(-180deg);
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4);
							-moz-transform: scale(0.4);
							transform: scale(0.4);
						<?php }?>
					}
					.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?> * { line-height: 1 !important; }
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect01'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							z-index: -1;
							position: absolute;
							content: "";
							left: 0.5em;
							width: calc(100% - 1em);
							top: 0.5em;
							height: calc(100% - 1em);
							-webkit-box-shadow: 0 10px 6px -6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow: 0 10px 6px -6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow: 0 10px 6px -6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow: 0 10px 6px -6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect02'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 23px;
							left: 10px;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-transform: rotate(-5deg);
							-moz-transform: rotate(-5deg);
							-o-transform: rotate(-5deg);
							-ms-transform: rotate(-5deg);
							transform: rotate(-5deg);
						}
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transform: rotate(5deg);
							-moz-transform: rotate(5deg);
							-o-transform: rotate(5deg);
							-ms-transform: rotate(5deg);
							transform: rotate(5deg);
							right: 10px;
							left: auto;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect03'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 23px;
							left: 10px;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-transform: rotate(-5deg);
							-moz-transform: rotate(-5deg);
							-o-transform: rotate(-5deg);
							-ms-transform: rotate(-5deg);
							transform: rotate(-5deg);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect04'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 23px;
							right: 10px;
							left: auto;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow: 0 11px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-transform: rotate(5deg);
							-moz-transform: rotate(5deg);
							-o-transform: rotate(5deg);
							-ms-transform: rotate(5deg);
							transform: rotate(5deg);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect05'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 25px;
							left: 10px;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-box-shadow: 0 18px 5px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow: 0 18px 5px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow: 0 18px 5px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow: 0 18px 5px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-webkit-transform: rotate(-3deg);
							-moz-transform: rotate(-3deg);
							-o-transform: rotate(-3deg);
							-ms-transform: rotate(-3deg);
							transform: rotate(-3deg);
						}
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transform: rotate(3deg);
							-moz-transform: rotate(3deg);
							-o-transform: rotate(3deg);
							-ms-transform: rotate(3deg);
							transform: rotate(3deg);
							right: 10px;
							left: auto;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect06'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content:"";
							position:absolute;
							z-index:-1;
							-webkit-box-shadow:0 6px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow:0 6px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow:0 6px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow:0 6px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							top:50%;
							bottom:0.7em;
							left:0.7em;
							right:0.7em;
							-moz-border-radius:100px / 10px;
							border-radius:100px / 10px;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect07'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content:"";
							position:absolute;
							z-index:-1;
							-webkit-box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							top:0.5em;
							bottom:0.5em;
							left:0.5em;
							right:0.5em;
							-moz-border-radius:100px / 10px;
							border-radius:100px / 10px;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect08'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content:"";
							position:absolute;
							z-index:-1;
							-webkit-box-shadow:0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow:0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow:0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow:0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							top:0.5em;
							bottom:0.5em;
							left:0.7em;
							right:0.7em;
							-moz-border-radius:100px / 10px;
							border-radius:100px / 10px;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05 == 'effect09'){ ?>
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content:"";
							position:absolute;
							z-index:-1;
							-webkit-box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-moz-box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							-o-box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							box-shadow:0 1px 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
							top:0.6em;
							bottom:0.6em;
							left:0.5em;
							right:0.5em;
							-moz-border-radius:100px / 10px;
							border-radius:100px / 10px;
						}
						.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							right:0.5em;
							-webkit-transform:skew(5deg) rotate(3deg);
							-moz-transform:skew(5deg) rotate(3deg);
							-ms-transform:skew(5deg) rotate(3deg);
							-o-transform:skew(5deg) rotate(3deg);
							transform:skew(5deg) rotate(3deg);
						}
					<?php }?>
					.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>
					{
						-webkit-transition: all 1s ease;
						-moz-transition: all 1s ease;
						-o-transition: all 1s ease;
						transition: all 1s ease;
						position: relative;
					}
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect01'){ ?>
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> { overflow: hidden; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							content: '';
							background: -webkit-linear-gradient(top, transparent 0%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?> 100%);
							background: linear-gradient(to bottom, transparent 0%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?> 100%);
							width: 100%;
							height: 50%;
							opacity: 0;
							position: absolute;
							top: 100%;
							left: 0;
							z-index: 2;
							-webkit-transition-property: top, opacity;
							-moz-transition-property: top, opacity;
							-o-transition-property: top, opacity;
							transition-property: top, opacity;
							-webkit-transition-duration: 0.3s;
							-moz-transition-duration: 0.3s;
							-o-transition-duration: 0.3s;
							transition-duration: 0.3s;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov1_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							padding: 20px;
							position: absolute;
							bottom: 0;
							left: 0;
							z-index: 3;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov1_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							display: block;
							opacity: 0;
							position: relative;
							top: 100px;
							-webkit-transition-property: top, opacity;
							-moz-transition-property: top, opacity;
							-o-transition-property: top, opacity;
							transition-property: top, opacity;
							-webkit-transition-duration: 0.3s;
							-moz-transition-duration: 0.3s;
							-o-transition-duration: 0.3s;
							transition-duration: 0.3s;
							-webkit-transition-delay: 0s;
							-moz-transition-delay: 0s;
							-o-transition-delay: 0s;
							transition-delay: 0s;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov1_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:focus:before, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:focus .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?>, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							opacity: 1;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:focus:before, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover:before { top: 50%; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:focus .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?>, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							top: 0;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:focus .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?>, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							-webkit-transition-delay: 0.15s;
							-moz-transition-delay: 0.15s;
							-o-transition-delay: 0.15s;
							transition-delay: 0.15s;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect02'){ ?>
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> { overflow: hidden; }
						.TS_GV_ClG_Div2_Hov2_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top: 0;
							left: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							width: 100%;
							height: 100%;
							opacity: 0;
							-webkit-transition: opacity 0.5s ease;
							-moz-transition: opacity 0.5s ease;
							-o-transition: opacity 0.5s ease;
							transition: opacity 0.5s ease;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov2_<?php echo $Total_Soft_Gallery_Video;?> { opacity: 1; }
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> img
						{
							-moz-transform: scale(1.09, 1.09);
							-ms-transform: scale(1.09, 1.09);
							-webkit-transform: scale(1.09, 1.09);
							transform: scale(1.09, 1.09);
							-moz-transition-property: all;
							-o-transition-property: all;
							-webkit-transition-property: all;
							transition-property: all;
							-moz-transition-duration: 0.4s;
							-o-transition-duration: 0.4s;
							-webkit-transition-duration: 0.4s;
							transition-duration: 0.4s;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> img
						{
							-moz-transform: scale(1, 1);
							-ms-transform: scale(1, 1);
							-webkit-transform: scale(1, 1);
							transform: scale(1, 1);
							-webkit-filter: blur(2px);
							filter: blur(2px);
							-moz-transition-property: all;
							-o-transition-property: all;
							-webkit-transition-property: all;
							transition-property: all;
							-moz-transition-duration: 0.8s;
							-o-transition-duration: 0.8s;
							-webkit-transition-duration: 0.8s;
							transition-duration: 0.8s;
						}
						.TS_GV_ClG_Div2_Hov2_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							position: relative;
							display: block;
							top: 50%;
							transform: translateY(-50%);
							-webkit-transform: translateY(-50%);
							-moz-transform: translateY(-50%);
							-o-transform: translateY(-50%);
							-webkit-transition-delay: 0.5s;
							transition-delay: 0.5s;
							-moz-transition-duration: 0.8s;
							-o-transition-duration: 0.8s;
							-webkit-transition-duration: 0.8s;
							transition-duration: 0.8s;
							opacity: 0;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov2_Title_<?php echo $Total_Soft_Gallery_Video;?> { opacity: 1; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect03'){ ?>
						.TS_GV_ClG_Div2_Hov3_Icon_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top: 50%;
							left: 50%;
							transform: translate(-50%, -50%) scale(0);
							-webkit-transform: translate(-50%, -50%) scale(0);
							-moz-transform: translate(-50%, -50%) scale(0);
							-o-transform: translate(-50%, -50%) scale(0);
							transition: all 300ms 0ms cubic-bezier(0.6, -0.28, 0.735, 0.045);
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>px;
						}
						.TS_GV_ClG_Div2_Hov3_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							left: 0;
							top: 0;
							width: 100%;
							height: 100%;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							-moz-transition-duration: 0.8s;
							-o-transition-duration: 0.8s;
							-webkit-transition-duration: 0.8s;
							transition-duration: 0.8s;
							opacity: 0;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov3_<?php echo $Total_Soft_Gallery_Video;?> { opacity: 1; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov3_Icon_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(-50%, -50%) scale(1);
							-webkit-transform: translate(-50%, -50%) scale(1);
							-moz-transform: translate(-50%, -50%) scale(1);
							-o-transform: translate(-50%, -50%) scale(1);
							transition: all 300ms 100ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect04'){ ?>
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>::before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							position: absolute;
							top: 0;
							right: 0;
							bottom: 0;
							left: 0;
							transform: scale3d(0, 0, 1);
							-webkit-transform: scale3d(0, 0, 1);
							-moz-transform: scale3d(0, 0, 1);
							-o-transform: scale3d(0, 0, 1);
							transition: transform .3s ease-out 0s;
							-webkit-transition: transform .3s ease-out 0s;
							-moz-transition: transform .3s ease-out 0s;
							-o-transition: transform .3s ease-out 0s;
							content: '';
							pointer-events: none;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							transform-origin: left top;
							z-index: 1;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							transform-origin: right bottom;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>::before, .TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>::after
						{
							transform: scale3d(1, 1, 1);
						}
						.TS_GV_ClG_Div2_Hov4_Span_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top: 50%;
							left: 50%;
							transform: translate(-50%, -50%) scale(0);
							-webkit-transform: translate(-50%, -50%) scale(0);
							-moz-transform: translate(-50%, -50%) scale(0);
							-o-transform: translate(-50%, -50%) scale(0);
							transition: all 300ms 0ms cubic-bezier(0.6, -0.28, 0.735, 0.045);
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							z-index: 2;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov4_Span_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(-50%, -50%) scale(1);
							-webkit-transform: translate(-50%, -50%) scale(1);
							-moz-transform: translate(-50%, -50%) scale(1);
							-o-transform: translate(-50%, -50%) scale(1);
							transition: all 300ms 100ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect05'){ ?>
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> { overflow: hidden; }
						.TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top: 0;
							left: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							width: 100%;
							height: 100%;
							opacity: 0;
							-webkit-transition: opacity 0.5s ease;
							-moz-transition: opacity 0.5s ease;
							-o-transition: opacity 0.5s ease;
							transition: opacity 0.5s ease;
							padding: 30px 3em;
						}
						.TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							position: absolute;
							top: 30px;
							right: 30px;
							bottom: 30px;
							left: 100%;
							border-left: 4px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							content: '';
							opacity: 0;
							background-color: rgba(255, 255, 255, 0.5);
							-webkit-transition: all 0.5s;
							-moz-transition: all 0.5s;
							-o-transition: all 0.5s;
							transition: all 0.5s;
							-webkit-transition-delay: 0.6s;
							-moz-transition-delay: 0.6s;
							-o-transition-delay: 0.6s;
							transition-delay: 0.6s;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?> { opacity: 1; }
						.TS_GV_ClG_Div2_Hov5_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							position: relative;
							display: block;
							top: 50%;
							-webkit-transform: translate3d(30%, -50%, 0);
							-moz-transform: translate3d(30%, -50%, 0);
							-o-transform: translate3d(30%, -50%, 0);
							transform: translate3d(30%, -50%, 0);
							-webkit-transition-delay: 0.3s;
							-moz-transition-delay: 0.3s;
							-o-transition-delay: 0.3s;
							transition-delay: 0.3s;
							opacity: 0;
							-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
							transition: opacity 0.35s,
							-webkit-transform 0.35s,
							-moz-transform 0.35s,
							-o-transform 0.35s,
							transform 0.35s;
							text-align: left;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov5_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							opacity: 1;
							-webkit-transform: translate3d(0%, -50%, 0);
							-moz-transform: translate3d(0%, -50%, 0);
							-o-transform: translate3d(0%, -50%, 0);
							transform: translate3d(0%, -50%, 0);
							-webkit-transition-delay: 0.4s;
							-moz-transition-delay: 0.4s;
							-o-transition-delay: 0.4s;
							transition-delay: 0.4s;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							background: rgba(255, 255, 255, 0);
							left: 30px;
							opacity: 1;
							-webkit-transition-delay: 0s;
							-moz-transition-delay: 0s;
							-o-transition-delay: 0s;
							transition-delay: 0s;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect06'){ ?>
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> { overflow: hidden; }
						.TS_GV_ClG_Div2_Hov6_<?php echo $Total_Soft_Gallery_Video;?>
						{
							bottom: 0;
							display: block;
							left: 0;
							position: absolute;
							right: 0;
							top: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							opacity: 0;
							-webkit-transition: opacity 0.5s ease;
							-moz-transition: opacity 0.5s ease;
							-o-transition: opacity 0.5s ease;
							transition: opacity 0.5s ease;
						}
						.TS_GV_ClG_Div2_Hov6_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							position: absolute;
							left: 0;
							width: 100%;
							bottom: 50%;
							-webkit-transform: translateY(50%);
							-moz-transform: translateY(50%);
							-o-transform: translateY(50%);
							transform: translateY(50%);
							-webkit-transition: all 0.3s ease-in-out;
							-moz-transition: all 0.3s ease-in-out;
							-o-transition: all 0.3s ease-in-out;
							transition: all 0.3s ease-in-out;
						}
						.TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							height: 78px;
							width: 78px;
							overflow: hidden;
							position: absolute;
							top: 50%;
							left: 50%;
							content: '';
							-webkit-transform: rotate(45deg) translate(-50%, -50%);
							-moz-transform: rotate(45deg) translate(-50%, -50%);
							-o-transform: rotate(45deg) translate(-50%, -50%);
							transform: rotate(45deg) translate(-50%, -50%);
							-webkit-transform-origin: 0 0;
							transform-origin: 0 0;
						}
						.TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:after, .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							position: absolute;
							content: "";
							display: block;
							-webkit-transition: all 0.4s ease-in-out;
							-moz-transition: all 0.4s ease-in-out;
							-o-transition: all 0.4s ease-in-out;
							transition: all 0.4s ease-in-out;
						}
						.TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:after { width: 65%; height: 2px; }
						.TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:after { width: 2px; height: 65%; }
						.TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:before { left: 0; top: 0; }
						.TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:after, .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:after { bottom: 0; right: 0; }
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> img
						{
							-webkit-transition: all 0.3s ease-in-out;
							-moz-transition: all 0.3s ease-in-out;
							-o-transition: all 0.3s ease-in-out;
							transition: all 0.3s ease-in-out;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> img
						{
							-webkit-transform: scale(1.1);
							-moz-transform: scale(1.1);
							-o-transform: scale(1.1);
							transform: scale(1.1);
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov6_<?php echo $Total_Soft_Gallery_Video;?> { opacity: 1; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov6_Title_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							opacity: 1;
							-webkit-transform: translateY(0px);
							-moz-transform: translateY(0px);
							-o-transform: translateY(0px);
							transform: translateY(0px);
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:before { width: 38%; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:before { height: 38%; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>:after { width: 55%; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>:after { height: 55%; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect07'){ ?>
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?> { overflow: hidden; }
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							content: "";
							width: 70%;
							height: 100%;
							border-radius: 50%;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							position: absolute;
							top: 0;
							left: -30%;
							transform: scale(0);
							-webkit-transform: scale(0);
							-moz-transform: scale(0);
							-o-transform: scale(0);
							transition: all 0.2s ease 0s;
							-webkit-transition: all 0.2s ease 0s;
							-moz-transition: all 0.2s ease 0s;
							-o-transition: all 0.2s ease 0s;
							z-index: 1;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover:before
						{
							transform: scale(2);
							-webkit-transform: scale(2);
							-moz-transform: scale(2);
							-o-transform: scale(2);
						}
						.TS_GV_ClG_Div2_Hov7_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top: 50%;
							left: 15%;
							transform: translate(-200%, -50%);
							-webkit-transform: translate(-200%, -50%);
							-moz-transform: translate(-200%, -50%);
							-o-transform: translate(-200%, -50%);
							transition: all 0.2s ease 0s;
							-webkit-transition: all 0.2s ease 0s;
							-moz-transition: all 0.2s ease 0s;
							-o-transition: all 0.2s ease 0s;
							z-index: 2;
							text-align: center;
							max-width: 50%;
						}
						.TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov7_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(0, -50%);
							-webkit-transform: translate(0, -50%);
							-moz-transform: translate(0, -50%);
							-o-transform: translate(0, -50%);
						}
						.TS_GV_ClG_Div2_Hov7_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							margin: 0; 
						}
						.TS_GV_ClG_Div2_Hov7_Ul_<?php echo $Total_Soft_Gallery_Video;?> { padding: 0; margin: 15px 0 !important; list-style: none; }
						.TS_GV_ClG_Div2_Hov7_Icon_<?php echo $Total_Soft_Gallery_Video;?>
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>px;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect08'){ ?>
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> { position: relative; overflow: hidden; }
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content: "";
							width: 100%;
							height: 100%;
							position: absolute;
							top:0;
							left: 0;
							background: rgba(0,0,0,0);
							transition: all 0.3s;
							-webkit-transition: all 0.3s;
							-moz-transition: all 0.3s;
							-o-transition: all 0.3s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover:after { background: rgba(0,0,0,0.2); }
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov8_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top:35%;
							left:0;
							width:100%;
							z-index: 1;
							transition: all 0.3s;
							-webkit-transition: all 0.3s;
							-moz-transition: all 0.3s;
							-o-transition: all 0.3s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov8_Ul_<?php echo $Total_Soft_Gallery_Video;?>
						{
							width: 40%;
							position:relative;
							top:0;
							padding:5px;
							text-align:center;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							border-radius: 0 0 5px 5px ;
							margin: 0 auto;
							transform: translate(0px, 0px);
							-webkit-transform: translate(0px, 0px);
							-moz-transform: translate(0px, 0px);
							-o-transform: translate(0px, 0px);
							transition: all 0.35s;
							-webkit-transition: all 0.35s;
							-moz-transition: all 0.35s;
							-o-transition: all 0.35s;
							line-height: 1;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov8_Ul_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(0px, 95%);
							-webkit-transform: translate(0px, 95%);
							-moz-transform: translate(0px, 95%);
							-o-transform: translate(0px, 95%);
						}
						.TS_GV_ClG_Div2_Hov8_Icon_<?php echo $Total_Soft_Gallery_Video;?>
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_13;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>px;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov8_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							width: 80%;
							position: absolute;
							top:0;
							left: 10%;
							padding: 10px;
							margin: 0;
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							box-shadow: 0 0 20px rgba(0, 0, 0, 0.85);
							text-align: center;
							transform: translate(0px, 0px);
							-webkit-transform: translate(0px, 0px);
							-moz-transform: translate(0px, 0px);
							-o-transform: translate(0px, 0px);
							transition: all 0.2s;
							-webkit-transition: all 0.2s;
							-moz-transition: all 0.2s;
							-o-transition: all 0.2s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov8_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(0px, -2px);
							-webkit-transform: translate(0px, -2px);
							-moz-transform: translate(0px, -2px);
							-o-transform: translate(0px, -2px);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect09'){ ?>
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> { position: relative; overflow: hidden; }
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content: "";
							position: absolute;
							top: 0;
							bottom: 0;
							left: 0;
							right: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							-webkit-transition: all 0.45s ease 0s;
							-moz-transition: all 0.45s ease 0s;
							-o-transition: all 0.45s ease 0s;
							transition: all 0.45s ease 0s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							-webkit-transform: skew(30deg) translateX(-80%);
							-moz-transform: skew(30deg) translateX(-80%);
							-o-transform: skew(30deg) translateX(-80%);
							transform: skew(30deg) translateX(-80%);
							z-index: 1;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover:before
						{
							-webkit-transform: skew(30deg) translateX(-20%);
							-moz-transform: skew(30deg) translateX(-20%);
							-o-transform: skew(30deg) translateX(-20%);
							transform: skew(30deg) translateX(-20%);
							-webkit-transition-delay: 0.05s;
							-moz-transition-delay: 0.05s;
							-o-transition-delay: 0.05s;
							transition-delay: 0.05s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transform: skew(-30deg) translateX(-70%);
							-moz-transform: skew(-30deg) translateX(-70%);
							-o-transform: skew(-30deg) translateX(-70%);
							transform: skew(-30deg) translateX(-70%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover:after
						{
							-webkit-transform: skew(-30deg) translateX(-10%);
							-moz-transform: skew(-30deg) translateX(-10%);
							-o-transform: skew(-30deg) translateX(-10%);
							transform: skew(-30deg) translateX(-10%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: absolute;
							top: 0;
							bottom: 0;
							left: 0;
							right: 0;
							z-index: 1;
							padding: 20px 40% 20px 20px;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content: "";
							position: absolute;
							top: 0;
							bottom: 0;
							left: 0;
							right: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
							z-index: -1;
							-webkit-transition: all 0.45s ease 0s;
							-moz-transition: all 0.45s ease 0s;
							-o-transition: all 0.45s ease 0s;
							transition: all 0.45s ease 0s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							-webkit-transform: skew(30deg) translateX(-100%);
							-moz-transform: skew(30deg) translateX(-100%);
							-o-transform: skew(30deg) translateX(-100%);
							transform: skew(30deg) translateX(-100%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							-webkit-transform: skew(30deg) translateX(-40%);
							-moz-transform: skew(30deg) translateX(-40%);
							-o-transform: skew(30deg) translateX(-40%);
							transform: skew(30deg) translateX(-40%);
							-webkit-transition-delay: 0.15s;
							-moz-transition-delay: 0.15s;
							-o-transition-delay: 0.15s;
							transition-delay: 0.15s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transform: skew(-30deg) translateX(-90%);
							-moz-transform: skew(-30deg) translateX(-90%);
							-o-transform: skew(-30deg) translateX(-90%);
							transform: skew(-30deg) translateX(-90%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transform: skew(-30deg) translateX(-30%);
							-moz-transform: skew(-30deg) translateX(-30%);
							-o-transform: skew(-30deg) translateX(-30%);
							transform: skew(-30deg) translateX(-30%);
							-webkit-transition-delay: 0.1s;
							-moz-transition-delay: 0.1s;
							-o-transition-delay: 0.1s;
							transition-delay: 0.1s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov9_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							margin: 0; 
							opacity: 0;
							-webkit-transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-o-transition: all 0.5s ease 0s;
							transition: all 0.5s ease 0s;
							z-index: 2;
							text-align: left;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov9_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							opacity: 0.9;
							-webkit-transition-delay: 0.2s;
							-moz-transition-delay: 0.2s;
							-o-transition-delay: 0.2s;
							transition-delay: 0.2s;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect10'){ ?>
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							overflow: hidden;
							text-align: center;
							-webkit-transition: all 0.55s ease;
							-moz-transition: all 0.55s ease;
							-o-transition: all 0.55s ease;
							transition: all 0.55s ease;
						}
						.TS_GV_ClG_Div2_Hov10_2_<?php echo $Total_Soft_Gallery_Video;?>
						{
							-webkit-transition: opacity 0.55s ease;
							-moz-transition: opacity 0.55s ease;
							-o-transition: opacity 0.55s ease;
							transition: opacity 0.55s ease;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
							opacity: 0;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_2_<?php echo $Total_Soft_Gallery_Video;?> { opacity: 1; }
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 10px;
							position: absolute;
							bottom: 25px;
							right: 25px;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content: "";
							width: 3000px;
							height: 2px;
							position: absolute;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							-webkit-transition: all 0.55s ease;
							-moz-transition: all 0.55s ease;
							-o-transition: all 0.55s ease;
							transition: all 0.55s ease;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							top: 0;
							left: 0;
							-webkit-transform: translateX(100%);
							-moz-transform: translateX(100%);
							-o-transform: translateX(100%);
							transform: translateX(100%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							bottom: 0;
							right: 0;
							-webkit-transform: translateX(-100%);
							-moz-transform: translateX(-100%);
							-o-transform: translateX(-100%);
							transform: translateX(-100%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							content: "";
							width: 2px;
							height: 3000px;
							position: absolute;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							-webkit-transition: all 0.55s ease;
							-moz-transition: all 0.55s ease;
							-o-transition: all 0.55s ease;
							transition: all 0.55s ease;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							top: 0;
							left: 0;
							-webkit-transform: translateY(100%);
							-moz-transform: translateY(100%);
							-o-transform: translateY(100%);
							transform: translateY(100%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							bottom: 0;
							right: 0;
							-webkit-transform: translateY(-100%);
							-moz-transform: translateY(-100%);
							-o-transform: translateY(-100%);
							transform: translateY(-100%);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:after, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transform: translate(0, 0);
							-moz-transform: translate(0, 0);
							-o-transform: translate(0, 0);
							transform: translate(0, 0);
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:before, .TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>:hover .TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>:after
						{
							-webkit-transition-delay: 0.15s;
							-moz-transition-delay: 0.15s;
							-o-transition-delay: 0.15s;
							transition-delay: 0.15s;
						}
						.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div2_Hov10_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							margin: 0;
						}
					<?php }else{ ?>
						.TS_GV_ClG_Div2_Hov_None_<?php echo $Total_Soft_Gallery_Video;?>
						{
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>;
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
						}
						.TS_GV_ClG_Div2_Hov_None_Title_<?php echo $Total_Soft_Gallery_Video;?>
						{
							line-height: 1;
							font-weight: 400;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>px;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_11;?>;
							margin: 0;
							position: relative;
							display: block;
							top: 50%;
							-webkit-transform: translateY(-50%);
							-moz-transform: translateY(-50%);
							-o-transform: translateY(-50%);
							transform: translateY(-50%);
						}
						.TS_GV_ClG_Div2_Hov_None_Title_<?php echo $Total_Soft_Gallery_Video;?> span
						{
							padding: 5px 10px;
							border: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>;
							border-radius: 2px;
						}
					<?php }?>
					.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> { display: block; width: 100%; padding-top: 56.25%; position: relative; }
					.TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?> img { width: 100%; height: 100%; position: absolute; top: 0; left: 0; margin: 0; }
					.TS_GV_ClG_Div_Full_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						position: fixed;
						width: 0%;
						height: 0%;
						top: 50%;
						left: 50%;
						background: rgba(0,0,0,0.1);
						z-index: 10000000;
						cursor: pointer;
					}
					.TS_GV_ClG_Div_box_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						position: fixed;
						display: none;
						width: 100%;
						top: 50%;
						left: 0;
						z-index: 10000001;
						transform: translateY(-50%);
						-webkit-transform: translateY(-50%);
						-moz-transform: translateY(-50%);
					}
					@media screen and (max-width:820px)
					{ 
						.TS_GV_ClG_Div_box_<?php echo $Total_Soft_Gallery_Video;?>  { top:0; transform: translateY(0%); -webkit-transform: translateY(0%); -moz-transform: translateY(0%); }
					}
					@media screen and (max-width:400px)
					{ 
						.TS_GV_ClG_Div_box_<?php echo $Total_Soft_Gallery_Video;?>  { top:10%; transform: translateY(0%); -webkit-transform: translateY(0%); -moz-transform: translateY(0%); }
					}
					.TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: relative;
						margin: 0 auto;
						width: 50%;
						height: inherit;
						display: none;
						padding: 1em;
						height: 100%;
						overflow-y: auto;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px; 
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
						max-height: 570px;
					}
					.TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar { width: 0.3em; }
					.TS_GV_ClTS_GV_ClG_Div_box_div1_G_Div_box_<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
					}
					.TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar-thumb 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>;
						outline: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>;
					}
					.TS_GV_ClG_Div_box_<?php echo $Total_Soft_Gallery_Video;?> h3 
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>px !important;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?> !important;
						text-align: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?> !important;
						line-height: 1 !important;
						font-weight: 400 !important;
						margin: 10px !important;
						text-transform: none !important;
						letter-spacing: 0 !important;
					}
					.TS_GV_ClG_Div_box_<?php echo $Total_Soft_Gallery_Video;?> p { margin: 10px 0; line-height: 1.3; }
					.TS_GV_ClG_Div_Close_Icon_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: fixed;
						display: none;
						top: 1em;
						right: 1em;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>px !important;
						z-index: 10000002;
						line-height: 1;
						cursor: pointer;
					}
					.TotalSoft_GV_CG_Link_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						left: calc(-1em - <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>px);
						padding: 0.3em 1em;
						top: 0;
						border-top: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>;
						border-right: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>;
						border-top-right-radius: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_34;?>px;
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_36;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_37;?> !important;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_38;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_39;?>;
						text-decoration: none !important;
						line-height: 1;
						box-shadow: none !important;
						-webkit-box-shadow: none !important;
						-moz-box-shadow: none !important;
						-o-box-shadow: none !important;
					}
					.TotalSoft_GV_CG_Link_<?php echo $Total_Soft_Gallery_Video;?>:hover, .TotalSoft_GV_CG_Link_<?php echo $Total_Soft_Gallery_Video;?>:focus
					{
						outline: none !important;
						text-decoration: none !important;
						box-shadow: none !important;
						-webkit-box-shadow: none !important;
						-moz-box-shadow: none !important;
						-o-box-shadow: none !important;
					}
					.TotalSoft_GV_CG_Link_<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?> !important;
					}
					.TotalSoft_GV_CG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?>:before
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>px !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?> !important;
					}
					.TS_GV_ClG_Div_box_span_<?php echo $Total_Soft_Gallery_Video;?>
					{
						display: block;
						margin: 10px auto;
						width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>%;
						border-top: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?> <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>;
					}
					.TS_GV_ClG_Div_video_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						position: relative;
						padding-bottom: 56.25%;
						padding-top: 30px;
						height: 0;
						width: 100%;
						overflow: hidden;
					}
					.TS_GV_ClG_Div_video_<?php echo $Total_Soft_Gallery_Video;?> iframe 
					{
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
					}
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 >= '1'){ ?>
						/* Landscape phones and down */
						@media (max-width: 620px) 
						{
							.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?> { width: 100%; margin: 0.5em 0; }
							.TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?> { width: 100%; max-height: 400px; }
							.TS_GV_ClG_Div_Close_Icon_<?php echo $Total_Soft_Gallery_Video;?> { z-index: 1000000000; top: 0.2em; right: 0.4em; font-size: 30px; }
						}
					<?php }?>
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 >= '3'){ ?>
						/* Landscape phone to portrait tablet */
						@media (max-width: 850px) 
						{
							.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?> { width: calc(49% - 1em); }
							.TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?> { margin: auto; width: 80%; max-height: 500px; }
						}
					<?php } ?>
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 >= '4'){ ?>
						/* Portrait tablet to landscape and desktop */
						@media (min-width: 850px) and (max-width: 979px) 
						{
							.TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?> { width: calc(32.3% - 1em); }
							.TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?> { width: 70%; max-height: 550px; }
						}
					<?php }?>
					.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> { list-style: none; display: inline-block; padding: 0; cursor: pointer; }
					.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li { display: inline; text-align: center; margin-left: 0 !important; }
					.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
					{
						float: left;
						display: block;
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>px;
						text-decoration: none;
						padding: 5px 12px;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
						margin-left: -1px;
						border: 1px solid transparent;
						line-height: 1.5;
					}
					.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active { outline: none; }
					<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 == 'style01'){ ?>
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span 
						{
							-moz-border-radius: 6px 0 0 6px;
							-webkit-border-radius: 6px;
							border-radius: 6px 0 0 6px;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span 
						{
							-moz-border-radius: 0 6px 6px 0;
							-webkit-border-radius: 0;
							border-radius: 0 6px 6px 0;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)  
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 == 'style02'){ ?>
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span
						{
							-moz-border-radius: 50px 0 0 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px 0 0 50px;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span 
						{
							-moz-border-radius: 0 50px 50px 0;
							-webkit-border-radius: 0;
							border-radius: 0 50px 50px 0;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 == 'style03'){ ?>
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							margin-left: 3px;
							padding: 0;
							width: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09 + 15;?>px;
							-moz-border-radius: 100%;
							-webkit-border-radius: 100%;
							border-radius: 100%;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 == 'style04'){ ?>
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							margin: 0 5px;
							padding: 0;
							width: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09 + 15;?>px;
							-moz-border-radius: 100%;
							-webkit-border-radius: 100%;
							border-radius: 100%;
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span
						{
							-moz-border-radius: 50px 0 0 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px 0 0 50px;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span
						{
							-moz-border-radius: 0 50px 50px 0;
							-webkit-border-radius: 0;
							border-radius: 0 50px 50px 0;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 == 'style05'){ ?>
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> { position: relative; z-index: 0; }
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: '';
							position: absolute;
							width: 100%;
							height: calc(100% - 7px);
							left: 0;
							bottom: 0;
							z-index: -1;
							background: -moz-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?> 50%, rgba(0, 0, 0, 0) 100%);
							background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?> 50%, rgba(0, 0, 0, 0) 100%);
							background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?> 50%, rgba(0, 0, 0, 0) 100%);
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span { padding: 12px 5px 5px; margin: 0 10px; position: relative; z-index: 0; }
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active) 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active):after 
						{
							content: '';
							position: absolute;
							width: calc(100% + 10px);
							height: calc(100% - 17px);
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
							-moz-border-radius: 100%;
							-webkit-border-radius: 100%;
							border-radius: 100%;
							z-index: -1;
							left: -5px;
							bottom: 5px;
							margin: auto;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span:hover:after, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span:hover:after 
						{
							display: none;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active:before 
						{
							content: '';
							position: absolute;
							top: -11px;
							left: -10px;
							width: calc(100% + 20px);
							border: 10px solid transparent;
							border-bottom: 7px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							z-index: -1;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active:hover:after { display: none; }
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 == 'style06'){ ?>
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?>
						{
							-moz-border-radius: 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
							padding: 10px 15px;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active):after
						{
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span
						{
							-moz-border-radius: 50px 0 0 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px 0 0 50px;
							padding: 10px 20px;
							position: relative;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span:after, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span:hover:after 
						{
							content: '';
							position: absolute;
							width: 10px;
							height: 100%;
							top: 0;
							right: 0;
							background: -moz-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> 100%);
							background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> 100%);
							background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> 100%);
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span 
						{
							-moz-border-radius: 0 50px 50px 0;
							-webkit-border-radius: 0;
							border-radius: 0 50px 50px 0;
							width: 50px;
							position: relative;
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span:after, .TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span:hover:after 
						{
							content: '';
							position: absolute;
							width: 10px;
							height: 100%;
							top: 0;
							left: 0;
							background: -moz-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> 0%, rgba(0, 0, 0, 0) 100%);
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> 0%, rgba(0, 0, 0, 0) 100%);
							background: linear-gradient(to right, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?> 0%, rgba(0, 0, 0, 0) 100%);
						}
						.TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>;
							-moz-box-shadow: 0 0 3px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?> inset;
							-webkit-box-shadow: 0 0 3px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?> inset;
							box-shadow: 0 0 3px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?> inset;
						}
					<?php }?>
					.TS_GV_ClG_LoadMore_<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09;?>px;
						border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>;
						cursor:pointer;
						display: inline-block;
						padding: 0.3em 1em !important;
						line-height: 1 !important;
					}
					.TS_GV_ClG_LoadMore_<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?>;
					}
					.TS_GV_ClG_Div_videoTD_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: relative;
						width: 100%;
					}
				</style>
				<div class="TS_GV_ClG_<?php echo $Total_Soft_Gallery_Video;?>">
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='All'){ ?>
							<div class="TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TS_GV_ClG_Div_Full<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>, <?php echo $i;?>)">
								<div class="TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>">
									<div class="TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>">
										<img id="TS_GV_ClG_Div2_Img_<?php echo $Total_Soft_Gallery_Video . '_' . $i;?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>"/>
										<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect01'){ ?>
											<div class="TS_GV_ClG_Div2_Hov1_<?php echo $Total_Soft_Gallery_Video;?>">
												<span class="TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											</div>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect02'){ ?>
											<div class="TS_GV_ClG_Div2_Hov2_<?php echo $Total_Soft_Gallery_Video;?>">
												<span class="TS_GV_ClG_Div2_Hov2_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											</div>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect03'){ ?>
											<div class="TS_GV_ClG_Div2_Hov3_<?php echo $Total_Soft_Gallery_Video;?>"></div>
											<i class="TS_GV_ClG_Div2_Hov3_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect04'){ ?>
											<span class="TS_GV_ClG_Div2_Hov4_Span_<?php echo $Total_Soft_Gallery_Video;?>">
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											</span>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect05'){ ?>
											<div class="TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?>">
												<span class="TS_GV_ClG_Div2_Hov5_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											</div>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect06'){ ?>
											<div class="TS_GV_ClG_Div2_Hov6_<?php echo $Total_Soft_Gallery_Video;?>"></div>
											<div class="TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>">
												<div class="TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>"></div>
											</div>
											<span class="TS_GV_ClG_Div2_Hov6_Title_<?php echo $Total_Soft_Gallery_Video;?>">
												<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
											</span>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect07'){ ?>
											<div class="TS_GV_ClG_Div2_Hov7_<?php echo $Total_Soft_Gallery_Video;?>">
												<span class="TS_GV_ClG_Div2_Hov7_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
												<ul class="TS_GV_ClG_Div2_Hov7_Ul_<?php echo $Total_Soft_Gallery_Video;?>">
													<li>
														<i class="TS_GV_ClG_Div2_Hov7_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
													</li>
												</ul>
											</div>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect08'){ ?>
											<span class="TS_GV_ClG_Div2_Hov8_<?php echo $Total_Soft_Gallery_Video;?>">
												<ul class="TS_GV_ClG_Div2_Hov8_Ul_<?php echo $Total_Soft_Gallery_Video;?>">
													<li>
														<i class="TS_GV_ClG_Div2_Hov8_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
													</li>
												</ul>
												<span class="TS_GV_ClG_Div2_Hov8_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											</span>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect09'){ ?>
											<div class="TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>">
												<span class="TS_GV_ClG_Div2_Hov9_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											</div>
										<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect10'){ ?>
											<div class="TS_GV_ClG_Div2_Hov10_2_<?php echo $Total_Soft_Gallery_Video;?>"></div>
											<div class="TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>">
												<div class="TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov10_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											</div>
										<?php }else{ ?>
											<div class="TS_GV_ClG_Div2_Hov_None_<?php echo $Total_Soft_Gallery_Video;?>">
												<span class="TS_GV_ClG_Div2_Hov_None_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<span>
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</span>
											</div>
										<?php }?>
									</div>
								</div>
							</div>
						<?php }else{ ?>
							<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
								<div class="TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?> GV_CG_Height_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TS_GV_ClG_Div_Full<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>, <?php echo $i;?>)" id="TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
									<div class="TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>">
										<div class="TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>">
											<img id="TS_GV_ClG_Div2_Img_<?php echo $Total_Soft_Gallery_Video . '_' . $i;?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>"/>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect01'){ ?>
												<div class="TS_GV_ClG_Div2_Hov1_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect02'){ ?>
												<div class="TS_GV_ClG_Div2_Hov2_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov2_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect03'){ ?>
												<div class="TS_GV_ClG_Div2_Hov3_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												<i class="TS_GV_ClG_Div2_Hov3_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect04'){ ?>
												<span class="TS_GV_ClG_Div2_Hov4_Span_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect05'){ ?>
												<div class="TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov5_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect06'){ ?>
												<div class="TS_GV_ClG_Div2_Hov6_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												<div class="TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>">
													<div class="TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												</div>
												<span class="TS_GV_ClG_Div2_Hov6_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect07'){ ?>
												<div class="TS_GV_ClG_Div2_Hov7_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov7_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
													<ul class="TS_GV_ClG_Div2_Hov7_Ul_<?php echo $Total_Soft_Gallery_Video;?>">
														<li>
															<i class="TS_GV_ClG_Div2_Hov7_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
														</li>
													</ul>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect08'){ ?>
												<span class="TS_GV_ClG_Div2_Hov8_<?php echo $Total_Soft_Gallery_Video;?>">
													<ul class="TS_GV_ClG_Div2_Hov8_Ul_<?php echo $Total_Soft_Gallery_Video;?>">
														<li>
															<i class="TS_GV_ClG_Div2_Hov8_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
														</li>
													</ul>
													<span class="TS_GV_ClG_Div2_Hov8_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</span>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect09'){ ?>
												<div class="TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov9_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect10'){ ?>
												<div class="TS_GV_ClG_Div2_Hov10_2_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												<div class="TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>">
													<div class="TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>">
														<span class="TS_GV_ClG_Div2_Hov10_Title_<?php echo $Total_Soft_Gallery_Video;?>">
															<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
														</span>
													</div>
												</div>
											<?php }else{ ?>
												<div class="TS_GV_ClG_Div2_Hov_None_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov_None_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<span>
															<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
														</span>
												</span>
												</div>
											<?php }?>
										</div>
									</div>
								</div>
							<?php }else{ ?>
								<div class="TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?> noshow1" onclick="TS_GV_ClG_Div_Full<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>, <?php echo $i;?>)" id="TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>" style="padding: 0; height: 0; display: none;">
									<div class="TS_GV_ClG_Div1_<?php echo $Total_Soft_Gallery_Video;?>">
										<div class="TS_GV_ClG_Div2_<?php echo $Total_Soft_Gallery_Video;?>">
											<img id="TS_GV_ClG_Div2_Img_<?php echo $Total_Soft_Gallery_Video . '_' . $i;?>" src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>" alt="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>"/>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect01'){ ?>
												<div class="TS_GV_ClG_Div2_Hov1_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov1_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect02'){ ?>
												<div class="TS_GV_ClG_Div2_Hov2_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov2_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect03'){ ?>
												<div class="TS_GV_ClG_Div2_Hov3_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												<i class="TS_GV_ClG_Div2_Hov3_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect04'){ ?>
												<span class="TS_GV_ClG_Div2_Hov4_Span_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect05'){ ?>
												<div class="TS_GV_ClG_Div2_Hov5_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov5_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect06'){ ?>
												<div class="TS_GV_ClG_Div2_Hov6_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												<div class="TS_GV_ClG_Div2_Hov6_1_<?php echo $Total_Soft_Gallery_Video;?>">
													<div class="TS_GV_ClG_Div2_Hov6_2_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												</div>
												<span class="TS_GV_ClG_Div2_Hov6_Title_<?php echo $Total_Soft_Gallery_Video;?>">
													<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
												</span>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect07'){ ?>
												<div class="TS_GV_ClG_Div2_Hov7_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov7_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
													<ul class="TS_GV_ClG_Div2_Hov7_Ul_<?php echo $Total_Soft_Gallery_Video;?>">
														<li>
															<i class="TS_GV_ClG_Div2_Hov7_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
														</li>
													</ul>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect08'){ ?>
												<span class="TS_GV_ClG_Div2_Hov8_<?php echo $Total_Soft_Gallery_Video;?>">
													<ul class="TS_GV_ClG_Div2_Hov8_Ul_<?php echo $Total_Soft_Gallery_Video;?>">
														<li>
															<i class="TS_GV_ClG_Div2_Hov8_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>"></i>
														</li>
													</ul>
													<span class="TS_GV_ClG_Div2_Hov8_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</span>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect09'){ ?>
												<div class="TS_GV_ClG_Div2_Hov9_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov9_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
													</span>
												</div>
											<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02 == 'effect10'){ ?>
												<div class="TS_GV_ClG_Div2_Hov10_2_<?php echo $Total_Soft_Gallery_Video;?>"></div>
												<div class="TS_GV_ClG_Div2_Hov10_<?php echo $Total_Soft_Gallery_Video;?>">
													<div class="TS_GV_ClG_Div2_Hov10_1_<?php echo $Total_Soft_Gallery_Video;?>">
														<span class="TS_GV_ClG_Div2_Hov10_Title_<?php echo $Total_Soft_Gallery_Video;?>">
															<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
														</span>
													</div>
												</div>
											<?php }else{ ?>
												<div class="TS_GV_ClG_Div2_Hov_None_<?php echo $Total_Soft_Gallery_Video;?>">
													<span class="TS_GV_ClG_Div2_Hov_None_Title_<?php echo $Total_Soft_Gallery_Video;?>">
														<span>
															<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
														</span>
													</span>
												</div>
											<?php }?>
										</div>
									</div>
								</div>
					<?php } } } ?>
					<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
						<div class="TotalSoftcenter" style="float: none !important;">
							<ul class="TS_GV_ClG_Pagination_<?php echo $Total_Soft_Gallery_Video;?>" style='margin:0px;padding:0px;'>
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16 != 'none'){ ?>
									<li onclick="Total_Soft_GV_CG_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')">
										<span><i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>-left"></i></span>
									</li>
								<?php }?>
								<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
									<?php if($i==1){ ?>
										<li id="TotalSoft_GV_CG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_CG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')">
											<span class="active"><?php echo $i;?></span>
										</li>
									<?php } else { ?>
										<li id="TotalSoft_GV_CG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_CG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')">
											<span><?php echo $i;?></span>
										</li>
									<?php }?>
								<?php }?>
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16 != 'none'){ ?>
									<li onclick="Total_Soft_GV_CG_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')">
										<span><i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>-right"></i></span>
									</li>
								<?php }?>
							</ul>
						</div>
					<?php }?>
					<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
						<div class="TotalSoftcenter" style="float: none !important;" id="TotalSoft_VG_CG_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
							<span class="TS_GV_ClG_LoadMore_<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_CG_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')">
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'Before' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 != 'none'){ ?>
									<i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>" style="margin-right: 5px;"></i>
								<?php }?>
								<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?>
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'After' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17 != 'none'){ ?>
									<i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>" style="margin-left: 5px;"></i>
								<?php }?>
							</span>
							<input type="text" style="display:none;" id="TotalSoft_VG_CG_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
						</div>
					<?php } ?>
					<input type="text" style="display:none;" class="TS_VG_CG_AE_<?php echo $Total_Soft_Gallery_Video;?>" value="<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>">
				</div>
				<div class="TS_GV_ClG_Div_Full_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TS_GV_ClG_Div_Full_Cl<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>)"></div>
				<i class="TS_GV_ClG_Div_Close_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>" onclick="TS_GV_ClG_Div_Full_Cl<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>)" style="display:none;"></i>
				<div class="TS_GV_ClG_Div_box_<?php echo $Total_Soft_Gallery_Video;?>">
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<div class="TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?> TS_GV_ClG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>">
							<div class="TS_GV_ClG_Div_video_<?php echo $Total_Soft_Gallery_Video;?>">
								<iframe src="" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="TS_GV_ClG_Div_videoTD_<?php echo $Total_Soft_Gallery_Video;?>">
								<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'true'){ ?>
									<h3><?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?></h3>
									<span class="TS_GV_ClG_Div_box_span_<?php echo $Total_Soft_Gallery_Video;?>"></span>
								<?php }?>
							</div>
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'true'){ ?>
								<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
							<?php }?>
							<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
								<div style='margin-top:10px; position: relative;'>
									<a class="TotalSoft_GV_CG_Link_<?php echo $Total_Soft_Gallery_Video;?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
										<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06 == 'Before'){ ?>
											<i class="TotalSoft_GV_CG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>" style="margin-right: 5px;"></i>
										<?php }?>
										<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_35;?>
										<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06 == 'After'){ ?>
											<i class="TotalSoft_GV_CG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>" style="margin-left: 5px;"></i>
										<?php }?>
									</a>
								</div>
							<?php }?>
						</div>
					<?php }?>
				</div>
				<script type="text/javascript">
					function TS_GV_ClG_Div_Full<?php echo $Total_Soft_Gallery_Video;?>(id, num)
					{
						jQuery('.TS_GV_ClG_Div_Full_'+id).animate({'width':'100%', 'height':'100%','top':'0','left':'0'},500);
						setTimeout(function(){
							jQuery('.TS_GV_ClG_Div_box_'+id).css({'display':'flex','display':'-webkit-flex'});
							jQuery('.TS_GV_ClG_Div_box_div1_'+id).css('display','none');
							jQuery('.TS_GV_ClG_Div_box_div1_'+id+'_'+num).css({'display':'block'});
							jQuery('.TS_GV_ClG_Div_Close_Icon_'+id).css({'display':'block'});
							var iframesource = jQuery('#TS_GV_ClG_Div2_Img_'+id+'_'+num).attr('alt');
							jQuery('.TS_GV_ClG_Div_box_div1_'+id+'_'+num+' iframe').attr('src',iframesource+'?autoplay=1;rel=0;iv_load_policy=3');
						},500)
					}
					function TS_GV_ClG_Div_Full_Cl<?php echo $Total_Soft_Gallery_Video;?>(id)
					{
						jQuery('.TS_GV_ClG_Div_box_'+id).css({'display':'none'});
						jQuery('.TS_GV_ClG_Div_box_div1_'+id).css('display','none');
						jQuery('.TS_GV_ClG_Div_box_div1_'+id+' iframe').attr('src','');
						jQuery('.TS_GV_ClG_Div_Close_Icon_'+id).css({'display':'none'});
						jQuery('.TS_GV_ClG_Div_Full_'+id).animate({'width':'0%', 'height':'0%','top':'50%','left':'50%'},500);
					}
					jQuery(document).ready(function(){
						var delaytime = 0;
						var TS_VG_CG_AE = jQuery('.TS_VG_CG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						var GV_CG_Height = jQuery('.GV_CG_Height_<?php echo $Total_Soft_Gallery_Video; ?>').css('height');

						jQuery('.TS_GV_ClG_<?php echo $Total_Soft_Gallery_Video;?> .TS_GV_ClG_Div1_Main_<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_CG_AE == 'none')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','opacity':'1'});
								}
								else if(TS_VG_CG_AE == '')
								{
									jQuery(this).animate({'height': GV_CG_Height, 'padding': '0.5em','opacity':'1'},1000).css({'display': 'inline-block'}).addClass('GV_CG_Height_<?php echo $Total_Soft_Gallery_Video; ?>');
								}
								else if(TS_VG_CG_AE == 'fadeIn')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'moveUp')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'scaleUp')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'fallPerspective')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'fly')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'flip')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'helix')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_CG_AE == 'popUp')
								{
									jQuery(this).css({'height': GV_CG_Height, 'padding': '0.5em', 'display':'inline-block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
				</script>
			<?php } else if($Total_Soft_GalleryV_Type[0]->TotalSoftGalleryV_SetType=='Space Gallery'){ ?>
				<style type="text/css">
					.TotalSoft_GV_SG_Website_<?php echo $Total_Soft_Gallery_Video;?>, .TotalSoft_GV_SG_Website_<?php echo $Total_Soft_Gallery_Video;?> *
					{
						margin: 0;
						padding: 0;
						box-sizing: border-box;
						-webkit-box-sizing: border-box;
						-moz-box-sizing: border-box;
						line-height: 1;
					}
					.TotalSoft_GV_SG_Grid_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						-webkit-column-count: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>;
						-moz-column-count: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>;
						column-count: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_02;?>;
						-webkit-column-gap: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px;
						-moz-column-gap: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px;
						column-gap: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'fallPerspective'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'fly'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'flip'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'helix'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'popUp'){ ?>
							-webkit-perspective: 1300px;
							-moz-perspective: 1300px;
							perspective: 1300px;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'animno' || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'animsc' || $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'animtr'){ ?>
							-webkit-perspective: 1000px;
							-moz-perspective: 1000px;
							perspective: 1000px;
						<?php }?>
						float: left !important;
						width: 100%;
					}
					@media (max-width: 850px) { .TotalSoft_GV_SG_Grid_<?php echo $Total_Soft_Gallery_Video;?> { -webkit-column-count: 2; -moz-column-count: 2; column-count: 2; } }
					@media (max-width: 600px) { .TotalSoft_GV_SG_Grid_<?php echo $Total_Soft_Gallery_Video;?> { -webkit-column-count: 1; -moz-column-count: 1; column-count: 1; } }
					.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						-webkit-column-break-inside: avoid;
						page-break-inside: avoid;
						break-inside: avoid;
						will-change: transform;
						opacity: 0;
						width: 100%;
						margin-bottom: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_03;?>px;
						position: relative;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'moveUp'){ ?>
							-webkit-transform: translateY(200px) translateZ(0);
							-moz-transform: translateY(200px) translateZ(0);
							transform: translateY(200px) translateZ(0);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'scaleUp'){ ?>
							-webkit-transform: scale(0.6) translateZ(0);
							-moz-transform: scale(0.6) translateZ(0);
							transform: scale(0.6) translateZ(0);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'fallPerspective'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							-moz-transform: translateZ(400px) translateY(300px) rotateX(-90deg);
							transform: translateZ(400px) translateY(300px) rotateX(-90deg);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'fly'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 50% 50% -300px;
							-moz-transform-origin: 50% 50% -300px;
							transform-origin: 50% 50% -300px;
							-webkit-transform: rotateX(-180deg) translateZ(0);
							-moz-transform: rotateX(-180deg) translateZ(0);
							transform: rotateX(-180deg) translateZ(0);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'flip'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform-origin: 0% 0%;
							-moz-transform-origin: 0% 0%;
							transform-origin: 0% 0%;
							-webkit-transform: rotateX(-80deg) translateZ(0);
							-moz-transform: rotateX(-80deg) translateZ(0);
							transform: rotateX(-80deg) translateZ(0);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'helix'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: rotateY(-180deg) translateZ(0);
							-moz-transform: rotateY(-180deg) translateZ(0);
							transform: rotateY(-180deg) translateZ(0);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01 == 'popUp'){ ?>
							-webkit-transform-style: preserve-3d;
							-moz-transform-style: preserve-3d;
							transform-style: preserve-3d;
							-webkit-transform: scale(0.4) translateZ(0);
							-moz-transform: scale(0.4) translateZ(0);
							transform: scale(0.4) translateZ(0);
						<?php }else{ ?>
							-webkit-transform: translateZ(0);
							-moz-transform: translateZ(0);
							transform: translateZ(0);
						<?php }?>
					}
					.TotalSoft_GV_SG_Videodiv_<?php echo $Total_Soft_Gallery_Video;?> { width: 100%; padding-top: 56.25%; position: relative; }
					.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoTitle_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: relative;
						display: block;
						padding: 5px 10px;
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_04;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_05;?>;
						text-align: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_06;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_07;?>;
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'transparent'){ ?>
							background: transparent !important;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'color'){ ?>
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> !important;
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient1'){ ?>
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;
							background: -webkit-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: -o-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: -moz-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient2'){ ?>
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;  
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: -o-linear-gradient(right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: -moz-linear-gradient(right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: linear-gradient(to right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient3'){ ?>
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;  
							background: -webkit-linear-gradient(left top, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: -o-linear-gradient(bottom right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: -moz-linear-gradient(bottom right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
							background: linear-gradient(to bottom right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient4'){ ?>
							background: -webkit-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -o-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -moz-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient5'){ ?>
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -o-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -moz-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: linear-gradient(to right, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient6'){ ?>
							background: -webkit-repeating-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 20%);
							background: -o-repeating-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 20%);
							background: -moz-repeating-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 20%);
							background: repeating-linear-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 20%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient7'){ ?>
							background: -webkit-repeating-linear-gradient(45deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: -o-repeating-linear-gradient(45deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: -moz-repeating-linear-gradient(45deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: repeating-linear-gradient(45deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient8'){ ?>
							background: -webkit-repeating-linear-gradient(190deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: -o-repeating-linear-gradient(190deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: -moz-repeating-linear-gradient(190deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: repeating-linear-gradient(190deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient9'){ ?>
							background: -webkit-repeating-linear-gradient(90deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: -o-repeating-linear-gradient(90deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: -moz-repeating-linear-gradient(90deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
							background: repeating-linear-gradient(90deg,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 7%,<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 10%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient10'){ ?>
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;
							background: -webkit-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -o-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -moz-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient11'){ ?>
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>;
							background: -webkit-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 5%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 15%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 60%);
							background: -o-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 5%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 15%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 60%);
							background: -moz-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 5%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 15%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 60%);
							background: radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 5%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 15%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 60%);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient12'){ ?>
							background: -webkit-radial-gradient(circle, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -o-radial-gradient(circle, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: -moz-radial-gradient(circle, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
							background: radial-gradient(circle, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>);
						<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_08 == 'gradient13'){ ?>
							background: -webkit-repeating-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 15%);
							background: -o-repeating-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 15%);
							background: -moz-repeating-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 15%);
							background: repeating-radial-gradient(<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?>, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_10;?> 10%, <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_09;?> 15%);
						<?php }?>
					}
					<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect01'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 10px;
							position: relative;
							display: block;
							text-align: center;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							font-weight: 400;
							text-shadow: none;
							-webkit-transition: all 0.3s;
							-moz-transition: all 0.3s;
							transition: all 0.3s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							position: absolute;
							left: 0;
							width: 100%;
							height: 2px;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							content: '';
							opacity: 0;
							-webkit-transition: all 0.3s;
							-moz-transition: all 0.3s;
							transition: all 0.3s;
							-webkit-transform: translateY(-10px);
							-moz-transform: translateY(-10px);
							transform: translateY(-10px);
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							top: 0;
							-webkit-transform: translateY(-10px);
							-moz-transform: translateY(-10px);
							transform: translateY(-10px);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							bottom: 0;
							-webkit-transform: translateY(10px);
							-moz-transform: translateY(10px);
							transform: translateY(10px);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>; 
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus:after 
						{
							opacity: 1;
							-webkit-transform: translateY(0px);
							-moz-transform: translateY(0px);
							transform: translateY(0px);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect02'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							display: block;
							text-align: center;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							padding: 10px;
							text-decoration: none;
							-webkit-tap-highlight-color: transparent;
							vertical-align: middle;
							-webkit-transform: translateZ(0);
							transform: translateZ(0);
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
							-moz-osx-font-smoothing: grayscale;
							position: relative;
							overflow: hidden;
							-webkit-transition: 0.3s ease-in-out color;
							-moz-transition: 0.3s ease-in-out color;
							transition: 0.3s ease-in-out color;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							content: "";
							position: absolute;
							z-index: -1;
							left: 50%;
							right: 50%;
							top: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							height: 3px;
							-webkit-transition-property: left, right;
							transition-property: left, right;
							-webkit-transition-duration: 0.3s;
							transition-duration: 0.3s;
							-webkit-transition-timing-function: ease-out;
							transition-timing-function: ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:active 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>; 
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:active:before 
						{
							left: 0;
							right: 0;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect03'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 10px;
							cursor: pointer;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							text-align: center;
							text-decoration: none;
							-webkit-tap-highlight-color: transparent;
							display: block;
							vertical-align: middle;
							-webkit-transform: translateZ(0);
							transform: translateZ(0);
							box-shadow: 0 0 1px transparent;
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
							-moz-osx-font-smoothing: grayscale;
							position: relative;
							-webkit-transition-property: color;
							transition-property: color;
							-webkit-transition-duration: 0.3s;
							transition-duration: 0.3s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							content: "";
							position: absolute;
							z-index: -1;
							top: 0;
							left: 0;
							right: 0;
							bottom: 0;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
							-webkit-transform: scaleY(0);
							transform: scaleY(0);
							-webkit-transform-origin: 50% 0;
							transform-origin: 50% 0;
							-webkit-transition-property: transform;
							transition-property: transform;
							-webkit-transition-duration: 0.3s;
							transition-duration: 0.3s;
							-webkit-transition-timing-function: ease-out;
							transition-timing-function: ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:active 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:active:before 
						{
							-webkit-transform: scaleY(1);
							transform: scaleY(1);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect04'){ ?>
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							padding: 10px 20px;
							position: relative;
							overflow: hidden;
							display: block;
							-webkit-transition: 0.3s ease-out;
							-moz-transition: 0.3s ease-out;
							transition: 0.3s ease-out;
							cursor: pointer;
							text-align: center;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							width: 5px;
							height: 5px;
							background: transparent;
							content: "";
							position: absolute;
							left: 5px;
							top: 5px;
							border-top: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							border-left: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-transition: 0.3s;
							-moz-transition: 0.3s;
							transition: 0.3s;
							opacity: 0;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							width: 5px;
							height: 5px;
							background: transparent;
							content: "";
							position: absolute;
							right: 5px;
							bottom: 5px;
							border-right: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							border-bottom: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-transition: 0.3s;
							-moz-transition: 0.3s;
							transition: 0.3s;
							opacity: 0;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							width: 5px;
							height: 5px;
							background: transparent;
							content: "";
							position: absolute;
							right: 5px;
							top: 5px;
							border-right: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							border-top: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-transition: 0.3s;
							-moz-transition: 0.3s;
							transition: 0.3s;
							opacity: 0;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							width: 5px;
							height: 5px;
							background: transparent;
							content: "";
							position: absolute;
							left: 5px;
							bottom: 5px;
							border-left: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							border-bottom: 2px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-transition: 0.3s;
							-moz-transition: 0.3s;
							transition: 0.3s;
							opacity: 0;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>:hover::before { opacity: 1; right: 0px; top: 0px; }
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>:hover::after { opacity: 1; left: 0px; bottom: 0px; }
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							opacity: 1;
							left: 0px;
							top: 0px;
						}
						.TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							opacity: 1;
							right: 0px;
							bottom: 0px;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect05'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 10px;
							cursor: pointer;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							text-align: center;
							text-decoration: none;
							-webkit-tap-highlight-color: transparent;
							display: block;
							position: relative;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							display: inline-block;
							opacity: 0;
							-webkit-transition: -webkit-transform 0.3s, opacity 0.2s;
							-moz-transition: -moz-transform 0.3s, opacity 0.2s;
							transition: transform 0.3s, opacity 0.2s;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							margin-right: 10px;
							content: "[";
							-webkit-transform: translateX(20px);
							-moz-transform: translateX(20px);
							transform: translateX(20px);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							margin-left: 10px;
							content: "]";
							-webkit-transform: translateX(-20px);
							-moz-transform: translateX(-20px);
							transform: translateX(-20px);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover::after, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus::after 
						{
							opacity: 1;
							-webkit-transform: translateX(0px);
							-moz-transform: translateX(0px);
							transform: translateX(0px);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect06'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?> 
						{
							padding: 12px 10px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							text-shadow: none;
							font-weight: 700;
							display: block;
							text-align: center;
							position: relative;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							position: absolute;
							left: 0;
							width: 100%;
							height: 3px;
							background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							content: "";
							-webkit-transition: -webkit-transform 0.3s;
							-moz-transition: -moz-transform 0.3s;
							transition: transform 0.3s;
							-webkit-transform: scale(0.85);
							-moz-transform: scale(0.85);
							transform: scale(0.85);
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before
						{
							bottom: 0;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::after 
						{
							opacity: 0;
							-webkit-transition: top 0.3s, opacity 0.3s, -webkit-transform 0.3s;
							-moz-transition: top 0.3s, opacity 0.3s, -moz-transform 0.3s;
							transition: top 0.3s, opacity 0.3s, transform 0.3s;
							top: calc(100% - 3px);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover::after, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus::after 
						{
							-webkit-transform: scale(1);
							-moz-transform: scale(1);
							transform: scale(1);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover::after, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus::after 
						{
							top: 0%;
							opacity: 1;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect07'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							text-shadow: none;
							display: block;
							text-align: center;
							-webkit-transition: color 0.3s;
							-moz-transition: color 0.3s;
							transition: color 0.3s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>::before 
						{
							position: absolute;
							top: calc(100% - <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18/2;?>px);
							left: 50%;
							color: transparent;
							content: "•";
							text-shadow: 0 0 transparent;
							-webkit-transition: text-shadow 0.3s, color 0.3s;
							-moz-transition: text-shadow 0.3s, color 0.3s;
							transition: text-shadow 0.3s, color 0.3s;
							-webkit-transform: translateX(-50%);
							-moz-transform: translateX(-50%);
							transform: translateX(-50%);
							pointer-events: none;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover::before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus::before 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							text-shadow: 10px 0 <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>, -10px 0 <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:focus 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect08'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							box-shadow: 0 15px 10px -10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 15px 10px -10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 15px 10px -10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect09'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
							box-shadow: 0 15px 10px -10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 15px 10px -10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 15px 10px -10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							box-shadow: 0 1px 4px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 1px 4px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 1px 4px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect10'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							bottom: 15px;
							width: 50%;
							height: 20%;
							max-width: 300px;
							max-height: 100px;
							box-shadow: 0 10px 10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 10px 10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 10px 10px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							left: 8px;
							transform: rotate(-3deg);
							-moz-transform: rotate(-3deg);
							-webkit-transform: rotate(-3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							right: 8px;
							transform: rotate(3deg);
							-moz-transform: rotate(3deg);
							-webkit-transform: rotate(3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							border-color: transparent;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							box-shadow: 0 15px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 15px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 15px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before { left: 10px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after { right: 10px; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect11'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid transparent;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							bottom: 15px;
							width: 50%;
							height: 20%;
							max-width: 300px;
							max-height: 100px;
							box-shadow: 0 15px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 15px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 15px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							left: 10px;
							transform: rotate(-3deg);
							-moz-transform: rotate(-3deg);
							-webkit-transform: rotate(-3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							right: 10px;
							transform: rotate(3deg);
							-moz-transform: rotate(3deg);
							-webkit-transform: rotate(3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							transition: box-shadow 600ms ease-out, left 200ms, right 200ms;
							-moz-transition: box-shadow 600ms ease-out, left 200ms, right 200ms;
							-webkit-transition: box-shadow 600ms ease-out, left 200ms, right 200ms;
							box-shadow: 0 8px 8px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 0 8px 8px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 0 8px 8px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before { left: 5px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after { right: 5px; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect12'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before,
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							bottom: 12px;
							width: 50%;
							height: 55%;
							max-width: 200px;
							max-height: 100px;
							box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before { left: 10px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after { right: 10px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							transform: skew(-8deg) rotate(-3deg);
							-moz-transform: skew(-8deg) rotate(-3deg);
							-webkit-transform: skew(-8deg) rotate(-3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							transform: skew(8deg) rotate(3deg);
							-moz-transform: skew(8deg) rotate(3deg);
							-webkit-transform: skew(8deg) rotate(3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before { display: none; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover { border-radius: 0 0 40% 0 / 0 0 30% 0; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect13'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							right: 10px;
							width: 50%;
							height: 55%;
							max-width: 200px;
							max-height: 100px;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before 
						{
							top: 12px;
							box-shadow: 1px -4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 1px -4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 1px -4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							bottom: 12px;
							box-shadow: 1px 4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 1px 4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 1px 4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							right: 0;
							border-radius: 0 3% 3% 0 / 0% 50% 50% 0;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							box-shadow: 10px -4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 10px -4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 10px -4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform: skew(-8deg) rotate(-3deg);
							-moz-transform: skew(-8deg) rotate(-3deg);
							-webkit-transform: skew(-8deg) rotate(-3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							box-shadow: 10px 4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 10px 4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 10px 4px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform: skew(8deg) rotate(3deg);
							-moz-transform: skew(8deg) rotate(3deg);
							-webkit-transform: skew(8deg) rotate(3deg);
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect14'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							transform-style: flat;
							-moz-transform-style: flat;
							-webkit-transform-style: flat;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: "";
							position: absolute;
							z-index: -2;
							transition: all 250ms ease-out;
							-moz-transition: all 250ms ease-out;
							-webkit-transition: all 250ms ease-out;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before,
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							bottom: 12px;
							width: 50%;
							height: 55%;
							max-width: 200px;
							max-height: 100px;
							box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before { left: 10px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:after { right: 10px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before, .TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-moz-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							-webkit-box-shadow: 1px 8px 12px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							transform: skew(-8deg) rotate(-3deg);
							-moz-transform: skew(-8deg) rotate(-3deg);
							-webkit-transform: skew(-8deg) rotate(-3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:after 
						{
							transform: skew(8deg) rotate(3deg);
							-moz-transform: skew(8deg) rotate(3deg);
							-webkit-transform: skew(8deg) rotate(3deg);
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover { border-radius: 0 0 40% 40% / 0 0 30% 30%; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect15'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							overflow: hidden;
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'none'){ ?>
								content: "";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'file-video-o'){ ?>
								content: "\f1c8";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'video-camera'){ ?>
								content: "\f03d";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'camera-retro'){ ?>
								content: "\f083";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'eye'){ ?>
								content: "\f06e";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'film'){ ?>
								content: "\f008";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'youtube-play'){ ?>
								content: "\f16a";
							<?php }?>
							font-family: FontAwesome;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							position: absolute;
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-align: center;
							-ms-flex-align: center;
							align-items: center;
							-webkit-box-pack: center;
							-ms-flex-pack: center;
							justify-content: center;
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								left: 0;
							<?php }else{ ?>
								right: 0;
							<?php }?>
							top: 0;
							opacity: 0;
							height: 100%;
							width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							-webkit-transition: opacity 0.2s linear 0s;
							-moz-transition: opacity 0.2s linear 0s;
							transition: opacity 0.2s linear 0s;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								text-indent: 20px;
							<?php }else{ ?>
								text-indent: -20px;
							<?php }?>
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before { opacity: 1; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect16'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							overflow: hidden;
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'none'){ ?>
								content: "";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'file-video-o'){ ?>
								content: "\f1c8";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'video-camera'){ ?>
								content: "\f03d";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'camera-retro'){ ?>
								content: "\f083";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'eye'){ ?>
								content: "\f06e";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'film'){ ?>
								content: "\f008";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'youtube-play'){ ?>
								content: "\f16a";
							<?php }?>
							font-family: FontAwesome;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							position: absolute;
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-align: center;
							-ms-flex-align: center;
							align-items: center;
							-webkit-box-pack: center;
							-ms-flex-pack: center;
							justify-content: center;
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								left: -<?php echo 2*$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							<?php }else{ ?>
								right: -<?php echo 2*$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							<?php }?>
							top: 0;
							height: 100%;
							width: <?php echo 2*$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							background-color: rgba(255, 255, 255, 0.3);
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
							text-align: center;
							backface-visibility: hidden;
								-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								text-indent: 20px;
							<?php }else{ ?>
								text-indent: -20px;
							<?php }?>
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								left: 0px;
							<?php }else{ ?>
								right: 0px;
							<?php }?>
							text-indent: 0px;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect17'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							overflow: hidden;
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'none'){ ?>
								content: "";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'file-video-o'){ ?>
								content: "\f1c8";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'video-camera'){ ?>
								content: "\f03d";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'camera-retro'){ ?>
								content: "\f083";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'eye'){ ?>
								content: "\f06e";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'film'){ ?>
								content: "\f008";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'youtube-play'){ ?>
								content: "\f16a";
							<?php }?>
							font-family: FontAwesome;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							position: absolute;
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-align: center;
							-ms-flex-align: center;
							align-items: center;
							-webkit-box-pack: center;
							-ms-flex-pack: center;
							justify-content: center;
							top: 100%;
							height: 100%;
							width: 100%;
							left: 0;
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
							text-align: center;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover { text-indent: -9999px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before { top: 0; text-indent: 0; }
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect18'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							overflow: hidden;
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'none'){ ?>
								content: "";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'file-video-o'){ ?>
								content: "\f1c8";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'video-camera'){ ?>
								content: "\f03d";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'camera-retro'){ ?>
								content: "\f083";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'eye'){ ?>
								content: "\f06e";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'film'){ ?>
								content: "\f008";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'youtube-play'){ ?>
								content: "\f16a";
							<?php }?>
							font-family: FontAwesome;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							position: absolute;
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-align: center;
							-ms-flex-align: center;
							align-items: center;
							-webkit-box-pack: center;
							-ms-flex-pack: center;
							justify-content: center;
							top: 0;
							height: 100%;
							width: 100%;
							left: 0;
							-webkit-transform: scale(0, 1);
							-moz-transform: scale(0, 1);
							transform: scale(0, 1);
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
							text-align: center;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover { text-indent: -9999px; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							-webkit-transform: scale(1, 1);
							-moz-transform: scale(1, 1);
							transform: scale(1, 1);
							text-indent: 0;
						}
					<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_19 == 'effect19'){ ?>
						.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>
						{
							position: relative;
							display: block;
							padding: 3px 0 0 0;
							cursor: pointer;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>
						{
							padding: 5px 10px;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_15;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_16;?>;
							font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_17;?>;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_18;?>px;
							display: block;
							text-align: center;
							position: relative;
							border: 1px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_12;?>;
							overflow: hidden;
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover
						{
							color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_21;?>;
							background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_20;?>;
						}
						.TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:before
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'none'){ ?>
								content: "";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'file-video-o'){ ?>
								content: "\f1c8";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'video-camera'){ ?>
								content: "\f03d";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'camera-retro'){ ?>
								content: "\f083";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'eye'){ ?>
								content: "\f06e";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'film'){ ?>
								content: "\f008";
							<?php }else if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 == 'youtube-play'){ ?>
								content: "\f16a";
							<?php }?>
							font-family: FontAwesome;
							font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							position: absolute;
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-align: center;
							-ms-flex-align: center;
							align-items: center;
							-webkit-box-pack: center;
							-ms-flex-pack: center;
							justify-content: center;
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								left: 0px;
								border-radius: 0 50% 50% 0;
								-webkit-transform-origin: left center;
								-moz-transform-origin: left center;
								transform-origin: left center;
							<?php }else{ ?>
								right: 0px;
								border-radius: 50% 0 0 50%;
								-webkit-transform-origin: right center;
								-moz-transform-origin: right center;
								transform-origin: right center;
							<?php }?>
							top: 0;
							height: 100%;
							width: <?php echo 2*$TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
							background-color: rgba(255, 255, 255, 0.3);
							-webkit-transform: scale(0, 1);
							-moz-transform: scale(0, 1);
							transform: scale(0, 1);
							-webkit-transition: all 0.2s linear 0s;
							-moz-transition: all 0.2s linear 0s;
							transition: all 0.2s linear 0s;
							text-align: center;
							backface-visibility: hidden;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover 
						{
							<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
								text-indent: 20px;
							<?php }else{ ?>
								text-indent: -20px;
							<?php }?>
						}
						.TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>:hover:before 
						{
							-webkit-transform: scale(1, 1);
							-moz-transform: scale(1, 1);
							transform: scale(1, 1);
							text-indent: 0px;
						}
					<?php }?>
					.TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?>
					{
						<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before'){ ?>
							margin-right: 5px;
						<?php }else{ ?>
							margin-left: 5px;
						<?php }?>
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_23;?>px;
					}
					.TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> iframe, .TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> video { position: absolute; width: 100%; height: 100%; top: 0; left: 0; }
					@-webkit-keyframes animtr
					{
						0% { -webkit-transform: translateY(100px); -moz-transform: translateY(100px); transform: translateY(100px); }
						70% { -webkit-transform: translateY(0px); -moz-transform: translateY(0px); transform: translateY(0px); }
						100% { opacity: 1; }
					}
					@-moz-keyframes animtr
					{
						0% { -moz-transform: translateY(100px); -moz-transform: translateY(100px); -moz-transform: translateY(100px); }
						70% { -moz-transform: translateY(0px); -moz-transform: translateY(0px); -moz-transform: translateY(0px); }
						100% { opacity: 1; }
					}
					@keyframes animtr 
					{
						0% { -webkit-transform: translateY(100px); -moz-transform: translateY(100px); transform: translateY(100px); }
						70% { -webkit-transform: translateY(0px); -moz-transform: translateY(0px); transform: translateY(0px); }
						100% { opacity: 1; }
					}
					@-webkit-keyframes animsc 
					{
						0% { -webkit-transform: scale(0.7); -moz-transform: scale(0.7); transform: scale(0.7); }
						50% { -webkit-transform: scale(1.2); -moz-transform: scale(1.2); transform: scale(1.2); }
						70% { -webkit-transform: scale(1); -moz-transform: scale(1); transform: scale(1); }
						100% { opacity: 1; }
					}
					@-moz-keyframes animsc 
					{
						0% { -moz-transform: scale(0.7); -moz-transform: scale(0.7); -moz-transform: scale(0.7); }
						50% { -moz-transform: scale(1.2); -moz-transform: scale(1.2); -moz-transform: scale(1.2); }
						70% { -moz-transform: scale(1); -moz-transform: scale(1); -moz-transform: scale(1); }
						100% { opacity: 1; }
					}
					@keyframes animsc 
					{
						0% { -webkit-transform: scale(0.7); -moz-transform: scale(0.7); transform: scale(0.7); }
						50% { -webkit-transform: scale(1.2); -moz-transform: scale(1.2); transform: scale(1.2); }
						70% { -webkit-transform: scale(1); -moz-transform: scale(1); transform: scale(1); }
						100% { opacity: 1; }
					}
					@-webkit-keyframes animno { 0% { opacity: 0; } 50% { opacity: 0.5; } 70% { opacity: 0.7; } 100% { opacity: 1; } }
					@-moz-keyframes animno { 0% { opacity: 0; } 50% { opacity: 0.5; } 70% { opacity: 0.7; } 100% { opacity: 1; } }
					@keyframes animno { 0% { opacity: 0; } 50% { opacity: 0.5; } 70% { opacity: 0.7; } 100% { opacity: 1; } }
					.TS_GV_SG_Div_Full_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: fixed;
						width: 0%;
						height: 0%;
						top: 50%;
						left: 50%;
						background: rgba(0,0,0,0.1);
						z-index: 10000000;
						cursor: pointer;
					}
					.TS_GV_SG_Div_box_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						position: fixed;
						display: none;
						width: 100%;
						top: 50%;
						left: 0;
						z-index: 10000001;
						transform: translateY(-50%);
						-webkit-transform: translateY(-50%);
						-moz-transform: translateY(-50%);
					}
					.TS_GV_SG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: relative;
						margin: 0 25%;
						width: 50%;
						height: inherit;
						display: none;
						height: 100%;
						transition: transform 1s;
						-webkit-transition: transform 1s;
						-moz-transition: transform 1s;
						transition-delay: 1s;
						-webkit-transition-delay: 1s;
						-moz-transition-delay: 1s;
						transform: translateX(0);
						-webkit-transform: translateX(0%);
						-moz-transform: translateX(0%);
					}
					.TS_GV_SG_Div_box_div1_a_<?php echo $Total_Soft_Gallery_Video;?>
					{
						transition-delay: 0s;
						-webkit-transition-delay: 0s;
						-moz-transition-delay: 0s;
						transform: translateX(-25%);
						-webkit-transform: translateX(-25%);
						-moz-transform: translateX(-25%);
					}
					.TS_GV_SG_Div_video_<?php echo $Total_Soft_Gallery_Video;?> 
					{
						position: relative;
						padding-top: 56.25%;
						width: 100%;
						z-index: 2;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						overflow: hidden;
						backface-visibility: hidden;
					}
					.TS_GV_SG_Div_video_<?php echo $Total_Soft_Gallery_Video;?> iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; transform: translateZ(0); -moz-transform: translateZ(0); -webkit-transform: translateZ(0); }					
					.TS_GV_SG_Div_box_div2_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						height: 50px;
						width: 50px;
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>;
						top: 50%;
						right: 0px;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						transform: rotate(45deg) translate(0px, -36px) translate3d(0, 0, 0);
						-webkit-transform: rotate(45deg) translate(0px, -36px) translate3d(0, 0, 0);
						-moz-transform: rotate(45deg) translate(0px, -36px) translate3d(0, 0, 0);
						perspective: 800px;
						transition-delay: 1s;
						-webkit-transition-delay: 1s;
						-moz-transition-delay: 1s;
						transition-duration: 1s;
						-webkit-transition-duration: 1s;
						-moz-transition-duration: 1s;
						cursor: pointer;
						z-index: 1;
					}
					.TS_GV_SG_Div_box_div2_a_<?php echo $Total_Soft_Gallery_Video;?>
					{
						transition-duration: 1s;
						-webkit-transition-duration: 1s;
						-moz-transition-duration: 1s;
						transition-delay: 0s;
						-webkit-transition-delay: 0s;
						-moz-transition-delay: 0s;
						transform: rotate(45deg) translate(-25px, -10px);
						-webkit-transform: rotate(45deg) translate(-25px, -10px);
						-moz-transform: rotate(45deg) translate(-25px, -10px);
					}
					.TotalSoft_GV_SG_Info_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						top: 50%;
						left: 50%;
						transform: translate(20%, -100%) rotate(-45deg);
						-webkit-transform: translate(20%, -100%) rotate(-45deg);
						-moz-transform: translate(20%, -100%) rotate(-45deg);
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
					}
					.TotalSoft_GV_SG_Info_1_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						top: 50%;
						left: 50%;
						transform: translate(20%, -100%) rotate(-45deg);
						-webkit-transform: translate(20%, -100%) rotate(-45deg);
						-moz-transform: translate(20%, -100%) rotate(-45deg);
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
					}
					.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						height: 100%;
						width: 50%;
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_27;?>;
						padding: 10px 10px 10px 45px;
						top: 0;
						right: 0;
						border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
						border-left: none;
						cursor: pointer;
						transition: transform 2s;
						-webkit-transition: transform 2s;
						-moz-transition: transform 2s;
						transition-delay: 0s;
						-webkit-transition-delay: 0s;
						-moz-transition-delay: 0s;
						transform: translateX(0%);
						-webkit-transform: translateX(0%);
						-moz-transform: translateX(0%);
						overflow-y: auto;
						box-sizing: border-box;
						-moz-box-sizing: border-box;
						-webkit-box-sizing: border-box;
						backface-visibility: hidden;
						-moz-backface-visibility: hidden;
						-webkit-backface-visibility: hidden;
					}
					.TS_GV_SG_Div_box_div3_a_<?php echo $Total_Soft_Gallery_Video;?>
					{
						transition-delay: 1s;
						-webkit-transition-delay: 1s;
						-moz-transition-delay: 1s;
						transform: translateX(99%);
						-webkit-transform: translateX(99%);
						-moz-transform: translateX(99%);
					}
					@media (max-width: 1000px) 
					{
						.TS_GV_SG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(0%);
							-webkit-transform: translateY(0%);
							-moz-transform: translateY(0%);
						}
						.TS_GV_SG_Div_box_div1_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(-25%);
							-webkit-transform: translateY(-25%);
							-moz-transform: translateY(-25%);
						}
						.TS_GV_SG_Div_box_div2_<?php echo $Total_Soft_Gallery_Video;?>
						{
							top: 100%;
							right: 50%;
							transform: rotate(45deg) translate(0px, -36px);
							-webkit-transform: rotate(45deg) translate(0px, -36px);
							-moz-transform: rotate(45deg) translate(0px, -36px);
							transition-delay: 1s;
							-webkit-transition-delay: 1s;
							-moz-transition-delay: 1s;
							transition-duration: 1s;
							-webkit-transition-duration: 1s;
							-moz-transition-duration: 1s;
						}
						.TS_GV_SG_Div_box_div2_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transition-duration: 1s;
							-webkit-transition-duration: 1s;
							-moz-transition-duration: 1s;
							transition-delay: 0s;
							-webkit-transition-delay: 0s;
							-moz-transition-delay: 0s;
							transform: rotate(45deg) translate(-25px, -62px);
							-webkit-transform: rotate(45deg) translate(-25px, -62px);
							-moz-transform: rotate(45deg) translate(-25px, -62px);
						}
						.TotalSoft_GV_SG_Info_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(20%, 0%) rotate(45deg);
							-webkit-transform: translate(20%, 0%) rotate(45deg);
							-moz-transform: translate(20%, 0%) rotate(45deg);
						}
						.TotalSoft_GV_SG_Info_1_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(20%, 0%) rotate(45deg);
							-webkit-transform: translate(20%, 0%) rotate(45deg);
							-moz-transform: translate(20%, 0%) rotate(45deg);
						}
						.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>
						{
							height: 50%;
							width: 100%;
							padding: 35px 10px 10px 10px;
							top: 50%;
							left: 0;
							border: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_25;?>px solid <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_26;?>;
							border-top: none;
							transform: translateY(0%);
							-webkit-transform: translateY(0%);
							-moz-transform: translateY(0%);
						}
						.TS_GV_SG_Div_box_div3_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(99%);
							-webkit-transform: translateY(99%);
							-moz-transform: translateY(99%);
						}
					}
					@media (max-width: 600px) 
					{
						.TS_GV_SG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>
						{
							width: 60%;
							margin: 0 20%;
							transform: translateY(-20%);
							-webkit-transform: translateY(-20%);
							-moz-transform: translateY(-20%);
						}
						.TS_GV_SG_Div_box_div1_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(-20%);
							-webkit-transform: translateY(-20%);
							-moz-transform: translateY(-20%);
						}
						.TS_GV_SG_Div_box_div2_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TS_GV_SG_Div_box_div2_a_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>
						{
							height: 45%;
							padding: 10px 10px 10px 10px;
							transform: translateY(99%);
							-webkit-transform: translateY(99%);
							-moz-transform: translateY(99%);
						}
						.TS_GV_SG_Div_box_div3_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(99%);
							-webkit-transform: translateY(99%);
							-moz-transform: translateY(99%);
						}
						.TotalSoft_GV_SG_CIcon_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(-50%, -50%) !important;
							-webkit-transform: translate(-50%, -50%) !important;
							-moz-transform: translate(-50%, -50%) !important;
						}
					}
					@media (max-width: 400px) 
					{
						.TS_GV_SG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>
						{
							width: 98%;
							margin: 0 1%;
							transform: translateY(-25%);
							-webkit-transform: translateY(-25%);
							-moz-transform: translateY(-25%);
						}
						.TS_GV_SG_Div_box_div1_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(-25%);
							-webkit-transform: translateY(-25%);
							-moz-transform: translateY(-25%);
						}
						.TS_GV_SG_Div_box_div2_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TS_GV_SG_Div_box_div2_a_<?php echo $Total_Soft_Gallery_Video;?> { display: none; }
						.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>
						{
							top: 20%;
							height: 80%;
							padding: 10px 10px 10px 10px;
							transform: translateY(99%);
							-webkit-transform: translateY(99%);
							-moz-transform: translateY(99%);
						}
						.TS_GV_SG_Div_box_div3_a_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translateY(99%);
							-webkit-transform: translateY(99%);
							-moz-transform: translateY(99%);
						}
						.TotalSoft_GV_SG_CIcon_<?php echo $Total_Soft_Gallery_Video;?>
						{
							transform: translate(0%, -100%) !important;
							-webkit-transform: translate(0%, -100%) !important;
							-moz-transform: translate(0%, -100%) !important;
						}
					}
					.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar { width: 6px; }
					.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
					}
					.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>::-webkit-scrollbar-thumb 
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						outline: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
					}
					.TS_GV_SG_Div_box_div3_Title_<?php echo $Total_Soft_Gallery_Video;?>
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_28;?>px;
						font-family: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_29;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_30;?>;
						display: block;
						text-align: center;
						padding: 7px 0;
					}
					.TS_GV_SG_Div_box_div3_LAT_<?php echo $Total_Soft_Gallery_Video;?> { position: relative; padding: 10px 0; }
					.TS_GV_SG_Div_box_div3_LAT_<?php echo $Total_Soft_Gallery_Video;?> span
					{
						width: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_31;?>%;
						height: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_32;?>px;
						background: <?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_33;?>;
						display: block;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01 == 'left'){ ?>
							float: left;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_01 == 'right'){ ?>
							float: right;
						<?php }else{ ?>
							margin: 0 auto;
						<?php }?>
					}
					.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?> * { line-height: 1; }
					.TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?> p { margin: 0; padding: 0; }
					.TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>
					{
						padding: 5px 10px;
						display: block;
						border: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_02;?>px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_03;?>;
						border-radius: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_04;?>px;
						text-decoration: none;
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
						line-height: 1 !important;
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_06;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_07;?>;
						text-align: center;
						<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09 == 'left'){ ?>
							margin-right: auto;
							margin-left: 0;
							width: max-content;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09 == 'right'){ ?>
							margin-left: auto;
							margin-right: 0;
							width: max-content;
						<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_09 == 'center'){ ?>
							margin: 0 auto;
							width: max-content;
						<?php }?>
						font-family: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_10;?>;
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_11;?>px;
					}
					.TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						text-decoration: none !important;
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_12;?> !important;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_13;?> !important;
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
					}
					.TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>:focus
					{
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
						outline: none !important;
					}
					.TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?>
					{
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_15;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_16;?>;
					}
					.TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>:hover .TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?>
					{
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_17;?>;
					}
					.TotalSoft_GV_SG_CIcon_<?php echo $Total_Soft_Gallery_Video;?>
					{
						position: absolute;
						top: 0;
						left: 0;
						z-index: 3;
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_20;?>px;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_21;?>;
						transform: translate(-50%, -50%);
						-webkit-transform: translate(-50%, -50%);
						-moz-transform: translate(-50%, -50%);
						cursor: pointer;
					}
					.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> { list-style: none; display: inline-block; padding: 0; cursor: pointer; }
					.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li { display: inline; text-align: center; margin-left: 0 !important; }
					.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
					{
						float: left;
						display: block;
						font-size: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?>px;
						text-decoration: none;
						padding: 5px 12px;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>;
						margin-left: -1px;
						border: 1px solid transparent;
						line-height: 1.5;
					}
					.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active { outline: none; }
					<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22 == 'style01'){ ?>
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span 
						{
							-moz-border-radius: 6px 0 0 6px;
							-webkit-border-radius: 6px;
							border-radius: 6px 0 0 6px;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span 
						{
							-moz-border-radius: 0 6px 6px 0;
							-webkit-border-radius: 0;
							border-radius: 0 6px 6px 0;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)  
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22 == 'style02'){ ?>
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span
						{
							-moz-border-radius: 50px 0 0 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px 0 0 50px;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span 
						{
							-moz-border-radius: 0 50px 50px 0;
							-webkit-border-radius: 0;
							border-radius: 0 50px 50px 0;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22 == 'style03'){ ?>
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							margin-left: 3px;
							padding: 0;
							width: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23 + 15;?>px;
							-moz-border-radius: 100%;
							-webkit-border-radius: 100%;
							border-radius: 100%;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22 == 'style04'){ ?>
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							margin: 0 5px;
							padding: 0;
							width: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23 + 15;?>px;
							-moz-border-radius: 100%;
							-webkit-border-radius: 100%;
							border-radius: 100%;
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span
						{
							-moz-border-radius: 50px 0 0 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px 0 0 50px;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span
						{
							-moz-border-radius: 0 50px 50px 0;
							-webkit-border-radius: 0;
							border-radius: 0 50px 50px 0;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active)
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>;
						}
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22 == 'style05'){ ?>
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> { position: relative; z-index: 0; }
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?>:after 
						{
							content: '';
							position: absolute;
							width: 100%;
							height: calc(100% - 7px);
							left: 0;
							bottom: 0;
							z-index: -1;
							background: -moz-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> 50%, rgba(0, 0, 0, 0) 100%);
							background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> 50%, rgba(0, 0, 0, 0) 100%);
							background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?> 50%, rgba(0, 0, 0, 0) 100%);
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span { padding: 12px 5px 5px; margin: 0 10px; position: relative; z-index: 0; }
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active) 
						{
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active):after 
						{
							content: '';
							position: absolute;
							width: calc(100% + 10px);
							height: calc(100% - 17px);
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
							-moz-border-radius: 100%;
							-webkit-border-radius: 100%;
							border-radius: 100%;
							z-index: -1;
							left: -5px;
							bottom: 5px;
							margin: auto;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span:hover:after, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span:hover:after 
						{
							display: none;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active:before 
						{
							content: '';
							position: absolute;
							top: -11px;
							left: -10px;
							width: calc(100% + 20px);
							border: 10px solid transparent;
							border-bottom: 7px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							z-index: -1;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active:hover:after { display: none; }
					<?php }else if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_22 == 'style06'){ ?>
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?>
						{
							-moz-border-radius: 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span 
						{
							border-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
							padding: 10px 15px;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span:hover:not(.active):after
						{
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
							background: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span
						{
							-moz-border-radius: 50px 0 0 50px;
							-webkit-border-radius: 50px;
							border-radius: 50px 0 0 50px;
							padding: 10px 20px;
							position: relative;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span:after, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:first-child span:hover:after 
						{
							content: '';
							position: absolute;
							width: 10px;
							height: 100%;
							top: 0;
							right: 0;
							background: -moz-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> 100%);
							background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> 100%);
							background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> 100%);
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span 
						{
							-moz-border-radius: 0 50px 50px 0;
							-webkit-border-radius: 0;
							border-radius: 0 50px 50px 0;
							width: 50px;
							position: relative;
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span:after, .TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> li:last-child span:hover:after 
						{
							content: '';
							position: absolute;
							width: 10px;
							height: 100%;
							top: 0;
							left: 0;
							background: -moz-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> 0%, rgba(0, 0, 0, 0) 100%);
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> 0%, rgba(0, 0, 0, 0) 100%);
							background: linear-gradient(to right, <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?> 0%, rgba(0, 0, 0, 0) 100%);
						}
						.TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?> span.active 
						{
							background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_26;?>;
							color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?>;
							-moz-box-shadow: 0 0 3px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?> inset;
							-webkit-box-shadow: 0 0 3px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?> inset;
							box-shadow: 0 0 3px <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_27;?> inset;
						}
					<?php }?>
					.TS_GV_SG_LoadMore_<?php echo $Total_Soft_Gallery_Video;?>
					{
						background-color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_24;?>;
						color:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_25;?>;
						font-size:<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_23;?>px;
						border: 1px solid <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_30;?>;
						cursor:pointer;
						display: inline-block;
						padding: 0.3em 1em !important;
						line-height: 1 !important;
					}
					.TS_GV_SG_LoadMore_<?php echo $Total_Soft_Gallery_Video;?>:hover
					{
						background-color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_28;?>;
						color: <?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_29;?>;
					}
				</style>
				<script type="text/javascript">
					function TotalSoft_GV_SG_OPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID, SG_V_NUM)
					{
						jQuery('.TS_GV_SG_Div_Full_'+SG_ID).animate({'width':'100%', 'height':'100%','top':'0','left':'0'},500);
						setTimeout(function(){
							var TotalSoftGallery_Video_ShowType<?php echo $Total_Soft_Gallery_Video;?> = jQuery(".TotalSoftGallery_Video_ShowType<?php echo $Total_Soft_Gallery_Video;?>").val();
							var iframesource<?php echo $Total_Soft_Gallery_Video;?>="";
							if( TotalSoftGallery_Video_ShowType<?php echo $Total_Soft_Gallery_Video;?> == "All" )
							{
								iframesource<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.TotalSoft_GV_SG_Item_'+SG_ID+'_'+SG_V_NUM+ ' iframe').attr('src');
								if(!iframesource<?php echo $Total_Soft_Gallery_Video;?>)
								{
									iframesource<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.TotalSoft_GV_SG_Item_'+SG_ID+'_'+SG_V_NUM+ ' video source').attr('src');
								}
							}
							else
							{
								iframesource<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.TotalSoft_GV_SG_Item_'+SG_ID+'_'+(SG_V_NUM+1)+ ' iframe').attr('src');
								if(!iframesource<?php echo $Total_Soft_Gallery_Video;?>)
								{
									iframesource<?php echo $Total_Soft_Gallery_Video;?> = jQuery('.TotalSoft_GV_SG_Item_'+SG_ID+'_'+(SG_V_NUM+1)+ ' video source').attr('src');
								}
							}
							jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM+' iframe').attr('src',iframesource<?php echo $Total_Soft_Gallery_Video;?>);
							jQuery('.TS_GV_SG_Div_box_'+SG_ID).css({'display':'block','display':'-webkit-flex'});
							jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID).css('display','none');
							jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM).css({'display':'block'});
						},500)
					}
					function TotalSoft_GV_SG_CPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID)
					{
						jQuery('.TS_GV_SG_Div_box_'+SG_ID).css({'display':'none'});
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID).css('display','none');
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+' iframe').attr('src','');
						jQuery('.TS_GV_SG_Div_Full_'+SG_ID).animate({'width':'0%', 'height':'0%','top':'50%','left':'50%'},500);
					}
					function TotalSoft_GV_SG_IPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID, SG_V_NUM)
					{
						jQuery('.TS_GV_SG_Div_box_div3_'+SG_ID+'_'+SG_V_NUM).addClass('TS_GV_SG_Div_box_div3_a_'+SG_ID);
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM).addClass('TS_GV_SG_Div_box_div1_a_'+SG_ID);
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM+' .TS_GV_SG_Div_box_div2_1_'+SG_ID).addClass('TS_GV_SG_Div_box_div2_a_'+SG_ID);
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM+' .TS_GV_SG_Div_box_div2_2_'+SG_ID).removeClass('TS_GV_SG_Div_box_div2_a_'+SG_ID);
					}
					function TotalSoft_GV_SG_DPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID, SG_V_NUM)
					{
						jQuery('.TS_GV_SG_Div_box_div3_'+SG_ID+'_'+SG_V_NUM).removeClass('TS_GV_SG_Div_box_div3_a_'+SG_ID);
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM).removeClass('TS_GV_SG_Div_box_div1_a_'+SG_ID);
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM+' .TS_GV_SG_Div_box_div2_2_'+SG_ID).addClass('TS_GV_SG_Div_box_div2_a_'+SG_ID);
						jQuery('.TS_GV_SG_Div_box_div1_'+SG_ID+'_'+SG_V_NUM+' .TS_GV_SG_Div_box_div2_1_'+SG_ID).removeClass('TS_GV_SG_Div_box_div2_a_'+SG_ID);
					}
					function TotalSoft_GV_SG_ClPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID, SG_V_NUM)
					{
						TotalSoft_GV_SG_DPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID, SG_V_NUM);
						TotalSoft_GV_SG_CPop<?php echo $Total_Soft_Gallery_Video;?>(SG_ID);
					}
					jQuery(document).ready(function(){
						var delaytime = 0;
						var TS_VG_SG_AE = jQuery('.TS_VG_SG_AE_<?php echo $Total_Soft_Gallery_Video; ?>').val();
						jQuery('.TotalSoft_GV_SG_Grid_<?php echo $Total_Soft_Gallery_Video;?> .TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?>').each(function(){
							if(!jQuery(this).hasClass('noshow1'))
							{
								delaytime++;
								if(TS_VG_SG_AE == 'animno')
								{
									jQuery(this).css({'display':'block','animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'animsc')
								{
									jQuery(this).css({'display':'block','animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'animtr')
								{
									jQuery(this).css({'display':'block','animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'fadeIn')
								{
									jQuery(this).css({'display':'block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'moveUp')
								{
									jQuery(this).css({'display':'block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'scaleUp')
								{
									jQuery(this).css({'display':'block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'fallPerspective')
								{
									jQuery(this).css({'display':'block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'fly')
								{
									jQuery(this).css({'display':'block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'flip')
								{
									jQuery(this).css({'display':'block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'helix')
								{
									jQuery(this).css({'display':'block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'popUp')
								{
									jQuery(this).css({'display':'block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
						})
					})
					function Total_Soft_GV_SG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
					{
						jQuery("html, body").animate({ scrollTop: jQuery('.TotalSoft_GV_SG_Website_'+TotalSoftGV_ID).position().top-100 }, 1000);
						var delaytime = 0;
						var TS_VG_SG_AE = jQuery('.TS_VG_SG_AE_'+TotalSoftGV_ID).val();
						for(i=1;i<=TotalSoftCV;i++)
						{
							if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
							{
								delaytime++;
								if(TS_VG_SG_AE == 'animno')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'animsc')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'animtr')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'fadeIn')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'moveUp')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'scaleUp')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'fallPerspective')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'fly')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'flip')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'helix')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
								}
								else if(TS_VG_SG_AE == 'popUp')
								{
									jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
								}
							}
							else
							{
								jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display': 'none'});
							}
						}
						jQuery('.TS_GV_SG_Pagination_'+TotalSoftGV_ID+' li').each(function(){ jQuery(this).find('span').removeClass('active'); })
						jQuery('#TotalSoft_GV_SG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
					}
					function Total_Soft_GV_SG_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
					{
						var TotalSoftPage='';
						jQuery('.TS_GV_SG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
							if(jQuery(this).find('span').hasClass('active'))
							{
								if(jQuery(this).find('span').html()!='1')
								{
									TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
									Total_Soft_GV_SG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
								}
							}
						})
					}
					function Total_Soft_GV_SG_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
					{
						var TotalSoftPage='';
						jQuery('.TS_GV_SG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
							if(jQuery(this).find('span').hasClass('active'))
							{
								if(jQuery(this).find('span').html()!=TotalSoftPC)
								{
									TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
									Total_Soft_GV_SG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
									return false;
								}
							}
						})
					}
					function Total_Soft_GV_SG_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
					{
						var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_SG_Page_'+TotalSoftGV_ID).val())+1);
						jQuery('#TotalSoft_VG_SG_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
						var delaytime = 0;
						var TS_VG_SG_AE = jQuery('.TS_VG_SG_AE_'+TotalSoftGV_ID).val();

						if(TotalSoftPage<=TotalSoftPC)
						{
							for(i=1;i<=TotalSoftCV;i++)
							{
								if(i<=TotalSoftPP*TotalSoftPage && i > TotalSoftPP*parseInt(parseInt(TotalSoftPage)-1))
								{
									delaytime++;
									if(TS_VG_SG_AE == 'animno')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animno 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'animsc')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animsc 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'animtr')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-webkit-animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards','-moz-animation':'animtr 3s cubic-bezier(0.77, 0.35, 0, 1.6) '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'fadeIn')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'moveUp')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'scaleUp')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'fallPerspective')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'fly')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'flip')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'helix')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
									}
									else if(TS_VG_SG_AE == 'popUp')
									{
										jQuery('.TotalSoft_GV_SG_Item_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
									}
								}
							}
							if(TotalSoftPage==TotalSoftPC)
							{
								jQuery('#TotalSoft_VG_SG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
							}
						}
						else
						{
							jQuery('#TotalSoft_VG_SG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
						}
					}
				</script>
				<div class="TotalSoft_GV_SG_Website_<?php echo $Total_Soft_Gallery_Video;?>">
					<div class="TotalSoft_GV_SG_Grid_<?php echo $Total_Soft_Gallery_Video;?>">
						<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
							<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType == 'All'){ ?>
								<div class="TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>">
									<span class="TotalSoft_GV_SG_VideoTitle_<?php echo $Total_Soft_Gallery_Video;?>">
										<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
									</span>
									<div class="TotalSoft_GV_SG_Videodiv_<?php echo $Total_Soft_Gallery_Video;?>">
										<?php if(strpos($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL,'.mp4') > 0){ ?>
											<video controls poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>">
												<source src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" type="video/mp4">
											</video>
										<?php } else { ?>
											<iframe src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>?autoplay=0&controls=1&showinfo=0&autohide=1&rel=0&iv_load_policy=3" frameborder="0" webkitAllowFullScreen></iframe>
										<?php }?>
									</div>
									<span class="TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>">
										<span class="TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_SG_OPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>, <?php echo $i;?>)">
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before' && $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 != 'none'){ ?>
												<i class="TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>"></i>
											<?php }?>
											<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>
											<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'after' && $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 != 'none'){ ?>
												<i class="TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>"></i>
											<?php }?>
										</span>
									</span>
								</div>
							<?php } else { ?>
								<?php if($i<$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage){ ?>
									<div class="TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?>">
										<span class="TotalSoft_GV_SG_VideoTitle_<?php echo $Total_Soft_Gallery_Video;?>">
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
										</span>
										<div class="TotalSoft_GV_SG_Videodiv_<?php echo $Total_Soft_Gallery_Video;?>">
											<?php if(strpos($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL,'.mp4') > 0){ ?>
												<video controls poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>">
													<source src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" type="video/mp4">
												</video>
											<?php } else { ?>
												<iframe src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>?autoplay=0&controls=1&showinfo=0&autohide=1&rel=0&iv_load_policy=3" frameborder="0" webkitAllowFullScreen></iframe>
											<?php }?>
										</div>
										<span class="TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>">
											<span class="TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_SG_OPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>, <?php echo $i;?>)">
												<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before' && $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>"></i>
												<?php }?>
												<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>
												<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'after' && $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>"></i>
												<?php }?>
											</span>
										</span>
									</div>
								<?php }else{ ?>
									<div class="TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?> TotalSoft_GV_SG_Item_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i+1;?> noshow1" style="display: none;">
										<span class="TotalSoft_GV_SG_VideoTitle_<?php echo $Total_Soft_Gallery_Video;?>">
											<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
										</span>
										<div class="TotalSoft_GV_SG_Videodiv_<?php echo $Total_Soft_Gallery_Video;?>">
											<?php if(strpos($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL,'.mp4') > 0){ ?>
												<video controls poster="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_IURL;?>">
													<source src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>" type="video/mp4">
												</video>
											<?php } else { ?>
												<iframe src="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VURL;?>?autoplay=0&controls=1&showinfo=0&autohide=1&rel=0&iv_load_policy=3" frameborder="0" webkitAllowFullScreen></iframe>
											<?php }?>
										</div>
										<span class="TotalSoft_GV_SG_VideoPMspan_<?php echo $Total_Soft_Gallery_Video;?>">
											<span class="TotalSoft_GV_SG_VideoPM_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_SG_OPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>, <?php echo $i;?>)">
												<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'before' && $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>"></i>
												<?php }?>
												<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_14;?>
												<?php if($TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_24 == 'after' && $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_VideoPMicon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_22;?>"></i>
												<?php }?>
											</span>
										</span>
									</div>
						<?php } } }?>
					</div>
					<input type="text" style="display: none;" class="TS_VG_SG_AE_<?php echo $Total_Soft_Gallery_Video; ?>" value="<?php echo $TotalSoftGallery_Video_Opt1[0]->TotalSoft_GV_1_01;?>">
				</div>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Pagination'){ ?>
					<div class="TotalSoftcenter">
						<ul class="TS_GV_SG_Pagination_<?php echo $Total_Soft_Gallery_Video;?>" style='margin:0px;padding:0px;'>
							<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31 != 'none'){ ?>
								<li onclick="Total_Soft_GV_SG_PageP('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')">
									<span><i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31;?>-left"></i></span>
								</li>
							<?php }?>
							<?php for($i=1;$i<=ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);$i++){ ?> 
								<?php if($i==1){ ?>
									<li id="TotalSoft_GV_SG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_SG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')">
										<span class="active"><?php echo $i;?></span>
									</li>
								<?php } else { ?>
									<li id="TotalSoft_GV_SG_PLi_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>" onclick="Total_Soft_GV_SG_Page('<?php echo $Total_Soft_Gallery_Video;?>','<?php echo $i?>','<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>')">
										<span><?php echo $i;?></span>
									</li>
								<?php }?>
							<?php }?>
							<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31 != 'none'){ ?>
								<li onclick="Total_Soft_GV_SG_PageN('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')">
									<span><i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_31;?>-right"></i></span>
								</li>
							<?php }?>
						</ul>
					</div>
				<?php }?>
				<?php if($Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType=='Load'){ ?>
					<div class="TotalSoftcenter" id="TotalSoft_VG_SG_PageDiv_<?php echo $Total_Soft_Gallery_Video;?>">
						<span class="TS_GV_SG_LoadMore_<?php echo $Total_Soft_Gallery_Video;?>" onclick="Total_Soft_GV_SG_PageLM('<?php echo $Total_Soft_Gallery_Video;?>', '<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage;?>', '<?php echo count($Total_Soft_GalleryV_Videos);?>', '<?php echo ceil(count($Total_Soft_GalleryV_Videos)/$Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_PerPage);?>')">
							<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'Before' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32 != 'none'){ ?>
								<i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32;?>" style="margin-right: 5px;"></i>
							<?php }?>
							<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_LoadMore;?>
							<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_33 == 'After' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32 != 'none'){ ?>
								<i class="totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_32;?>" style="margin-left: 5px;"></i>
							<?php }?>
						</span>
						<input type="text" style="display:none;" id="TotalSoft_VG_SG_Page_<?php echo $Total_Soft_Gallery_Video;?>" value="1">
					</div>
				<?php } ?>
				<div class="TS_GV_SG_Div_Full_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_SG_CPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>)"></div>
				<div class="TS_GV_SG_Div_box_<?php echo $Total_Soft_Gallery_Video;?>">
					<?php for($i=0;$i<count($Total_Soft_GalleryV_Videos);$i++){ ?>
						<div class="TS_GV_SG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?> TS_GV_SG_Div_box_div1_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>">
							<div class="TS_GV_SG_Div_video_<?php echo $Total_Soft_Gallery_Video;?>">								
								<iframe src="" frameborder="0" allowfullscreen></iframe>
							</div>
							<i onclick="TotalSoft_GV_SG_ClPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>,<?php echo $i;?>)" class="TotalSoft_GV_SG_CIcon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_19;?>"></i>
							<div class="TS_GV_SG_Div_box_div2_<?php echo $Total_Soft_Gallery_Video;?> TS_GV_SG_Div_box_div2_1_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_SG_IPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>,<?php echo $i;?>)">
								<i class="TotalSoft_GV_SG_Info_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-chevron-right"></i>
							</div>
							<div class="TS_GV_SG_Div_box_div2_<?php echo $Total_Soft_Gallery_Video;?> TS_GV_SG_Div_box_div2_2_<?php echo $Total_Soft_Gallery_Video;?> TS_GV_SG_Div_box_div2_a_<?php echo $Total_Soft_Gallery_Video;?>" onclick="TotalSoft_GV_SG_DPop<?php echo $Total_Soft_Gallery_Video;?>(<?php echo $Total_Soft_Gallery_Video;?>,<?php echo $i;?>)">
								<i class="TotalSoft_GV_SG_Info_1_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-chevron-left"></i>
							</div>
							<div class="TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?> TS_GV_SG_Div_box_div3_<?php echo $Total_Soft_Gallery_Video;?>_<?php echo $i;?>">
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08 == 'beforetitle'){ ?>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
										<div style='position: relative;'>
											<a class="TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'before' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-right: 5px;"></i>
												<?php }?>
												<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'after' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-left: 5px;"></i>
												<?php }?>
											</a>
										</div>
									<?php }?>
								<?php }?>
								<div style='position: relative;'>
									<span class="TS_GV_SG_Div_box_div3_Title_<?php echo $Total_Soft_Gallery_Video;?>">
										<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VT);?>
									</span>
								</div>
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08 == 'aftertitle'){ ?>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
										<div style='position: relative;'>
											<a class="TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'before' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-right: 5px;"></i>
												<?php }?>
												<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'after' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-left: 5px;"></i>
												<?php }?>
											</a>
										</div>
									<?php }?>
								<?php }?>
								<div class="TS_GV_SG_Div_box_div3_LAT_<?php echo $Total_Soft_Gallery_Video;?>">
									<span></span>
								</div>
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08 == 'afterline'){ ?>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
										<div style='position: relative;'>
											<a class="TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'before' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-right: 5px;"></i>
												<?php }?>
												<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'after' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-left: 5px;"></i>
												<?php }?>
											</a>
										</div>
									<?php }?>
								<?php }?>
								<div style="position: relative; padding: 5px 0;">
									<?php echo html_entity_decode($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VDesc);?>
								</div>
								<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_08 == 'afterdesc'){ ?>
									<?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink != ''){ ?>
										<div style='margin:5px 0; position: relative;'>
											<a class="TotalSoft_GV_SG_Link_<?php echo $Total_Soft_Gallery_Video;?>" href="<?php echo $Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VLink;?>" <?php if($Total_Soft_GalleryV_Videos[$i]->TotalSoftGallery_Video_VONT=='true'){echo 'target="_blank"';}?>>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'before' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-right: 5px;"></i>
												<?php }?>
												<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_05;?>
												<?php if($TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_18 == 'after' && $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14 != 'none'){ ?>
													<i class="TotalSoft_GV_SG_Link_Icon_<?php echo $Total_Soft_Gallery_Video;?> totalsoft totalsoft-<?php echo $TotalSoftGallery_Video_Opt2[0]->TotalSoft_GV_2_14;?>" style="margin-left: 5px;"></i>
												<?php }?>
											</a>
										</div>
									<?php }?>
								<?php }?>
							</div>
						</div>
					<?php }?>
				</div>
				<input type="text" style="display: none;" class="TotalSoftGallery_Video_ShowType<?php echo $Total_Soft_Gallery_Video;?>" value="<?php echo $Total_Soft_GalleryV_Man[0]->TotalSoftGallery_Video_ShowType; ?>">
			<?php
			echo $after_widget;
			}
		}
	}
?>