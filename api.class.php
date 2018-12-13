<?php
	class Api{
        
        /** Get the current challenges (BR)*/
		public static function getChallenges($season = 'season4', $language = 'en'){
            $challenges = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/challenges/get',array('season' => $season, 'language' => $language));
            if(!empty($challenges)){
                return $challenges;
            }
            return false;
            
		}
        
        /** Get the current store (BR)*/
        public static function store($language = 'en'){
            $store = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/store/get',array('language' => $language));
            if(!empty($store)){
                return $store;
            }
            return false;
            
		}
        
        /** Get the upcoming items (BR)*/
        public static function upcoming($language = 'en'){
            $upcoming = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/upcoming/get',array('language' => $language));
            if(!empty($upcoming)){
                return $upcoming;
            }
            return false;
		}
        
         /** Top 20.000.000 most wins, kills, score, or matches played.*/
         public static function leaderboards($limit = 100, $page = 0, $window = ''){
            $windows = ['kills', 'wins', 'matches', 'score'];

            if(in_array($window,$windows)){
                $leaderboards = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/leaderboards/worldwide',array('users_per_page' => $limit, 'offset' => $page, 'window' => $window));
                if(!empty($leaderboards)){
                    return $leaderboards;
                }
            }
            return false;
		}
        
        /** Last 15 news messages.*/
        public static function news($type = 'br', $language = 'en'){
            $news = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/'.$type.'_motd/get',array('language' => $language));
            if(!empty($news)){
                return $news;
            }
            return false;
        }
        
        /** Get the current PVE info.*/
        public static function pveInfo($type = 'br', $language = 'en'){
            $pveInfo = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/pveinfo/get',array());
            if(!empty($pveInfo)){
                return $pveInfo;
            }
            return false;
		}
        
        /**Patchnotes.*/
        public static function patchNotes(){
            $patchNotes = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/patchnotes/get',array());
            if(!empty($patchNotes)){
                return $patchNotes;
            }
            return false;

		}

        /** the current server status..*/
        public static function serverStatus(){
            $status = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/status/fortnite_server_status',array());
            if(!empty($status)){
                return $status;
            }
            return false;
		}
        
        /** get weapons..*/
        public static function getWeapons(){
            $weapons = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/weapons/get',array());
            if(!empty($weapons)){
                return $weapons;
            }
            return false;
		}
        
        /** get id from username ..*/
        public static function getPlayerId($username = ''){
            $id = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/users/id',array('username' => urlencode($username)));

            if(!empty($id)){
                return $id;
            }
            return false;
		}
        
        /** get user stats ..*/
        public static function getPlayerStats($user_id='',$platform){
            $windows = ['alltime', 'season4', 'season5', 'season6', 'season7'];

            foreach($windows as $season){
                if(in_array($season,$windows)){
                    $stats[$season] = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/users/public/br_stats',array('user_id' => $user_id, 'platform' => $platform, 'window' => $season));
                }
            }
		if(!empty($stats)){
                        return $stats;
                    }
            return false;
		}
        
        /** get user matches ..*/
        public static function getPlayerMatches($user_id='',$platform, $window,$rows){
            $windows = ['season7'];
            foreach($windows as $season){
                if(in_array($season,$windows)){
                    $matches[$season] = curl_get('https://fortnite-public-api.theapinetwork.com/prod09/users/public/matches',array('user_id' => $user_id, 'platform' => $platform, 'window' => $window,'rows' => $rows));
                }
            }
	 if(!empty($matches)){
		return $matches;
	    }
            return false;
		}
	}
