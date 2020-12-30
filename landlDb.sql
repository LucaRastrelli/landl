-- Progettazione Web 
DROP DATABASE if exists landldb; 
CREATE DATABASE landldb; 
USE landldb; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: landldb
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `canzoni`
--

DROP TABLE IF EXISTS `canzoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canzoni` (
  `artista` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `testo` varchar(6000) NOT NULL,
  `album` varchar(100) NOT NULL,
  `difficolta` int(100) NOT NULL,
  PRIMARY KEY (`artista`,`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canzoni`
--

LOCK TABLES `canzoni` WRITE;
/*!40000 ALTER TABLE `canzoni` DISABLE KEYS */;
INSERT INTO `canzoni` VALUES ('Angels & Airwaves','Kiss & Tell','It\'s a little red cherry when you bury any evidence you got if you feel a bit shallow on the gallows can we try a new gunshot? Like when kids say never say never running blind with a pair of sharp scissors so if I\'m gonna go try this alibi this we are innocent but lost','Kiss & Tell',3),('Bastille','Pompeii','I was left to my own devices many days fell away with nothing to show and the walls kept tumbling down in the city that we love grey clouds roll over the hills bringing darkness from above but if you close your eyes does it almost feel like nothing changed at all? And if you close your eyes does it almost feel like you\'ve been here before? How am I gonna be an optimist about this?','Bad Blood',3),('blink-182','Feeling This','This place was never the same again after you came and went how could you say you meant anything different to anyone standing alone on the street with a cigarette on the first night we met look to the past and remember and smile and maybe tonight I can breathe for a while I\'m not in this scene I think I\'m falling asleep but then all that it means is I\'ll always be dreaming of you','blink-182',4),('blink-182','I Miss You','Where are you? And I\'m so sorry I cannot sleep I cannot dream tonight I need somebody and always this sick strange darkness comes creeping on so haunting every time and as I stared I counted the webs from all the spiders catching things and eating their insides like indecision to call you and hear your voice of treason will you come home and stop the pain tonight','blink-182',2),('Eminem ft Rihanna','The Monster','When I blew, see, but it was confusing cause all I wanted to do is be the Bruce Lee of loose leaf abused ink used it as a tool when I blew steam hit the lottery but with what I gave up to get it was bittersweet it was like winning a used mink ironic cause I think I\'m getting so huge I need a shrink I\'m beginning to lose sleep one sheep two sheep going coocoo and kooky as Kool Keith but I\'m actually weirder than you think','The Monster',4),('Guns N Roses','Paradise City','Take me down to the paradise city where the grass is green and the girls are pretty take me home oh won\'t you please take me home','Appetite For Destruction',1),('Linkin Park','Bleed It Out','Go stop the show choppy words in a sloppy flow shotgun opera lock and load cock it back and then watch it go mama help me I\'ve been cursed death is rolling in every verse candy paint on his brand new hearse can\'t contain him he knows he works this hurts I won\'t lie doesn\'t matter how hard I try half the words don\'t mean a thing and I know that I won\'t be satisfied so why try ignoring him? Make it a dirty dance floor again say your prayers and stomp it out when they bring that chorus in','Minutes To Midnight',3),('Macklemore','Can\'t Hold Us','Return of the Mack get up what it is what it does what it is what it isn\'t looking for a better way to get up out of bed instead of getting on the internet and checking a new hit we get up fresh out pimp strut walking little bit of humble little bit of cautious somewhere between like Rocky and Cosby sweater game nope nope y\'all can\'t copy that','The Heist',4),('Maroon 5','Payphone','I know it\'s hard to remember the people we used to be it\'s even harder to picture that you\'re not here next to me you say it\'s too late to make it but is it too late to try? And in our time that you wasted all of our bridges burned down I\'ve wasted my nights you turned out the lights now I\'m paralyzed still stuck in that time when we called it love but even the sun sets in paradise','Overexposed',2),('Passenger','Let Her Go','Well you only need the light when it\'s burning low only miss the sun when it starts to snow only know you love her when you let her go only know you\'ve been high when you\'re feeling low only hate the road when you\'re missing home only know you love her when you let her go and you let her go','All The Little Lights',1),('The Police','Every Breath You Take','Since you\'ve gone I\'ve been lost without a trace I dream at night I can only see your face I look around but it\'s you I can\'t replace I feel so cold and I long for your embrace I keep crying baby baby please','Synchronicity',1),('Toto','Africa','It\'s gonna take a lot to drag me away from you there\'s nothing that a hundred men or more could ever do I bless the rains down in Africa gonna take some time to do the things we never had','Toto IV',1),('True Damage','GIANTS','Moving too fast life is moving in slowmo I\'m a god better ask if you don\'t know homie better put your pride aside I\'m a Benz and you\'re more like a Volvo your best stuff looks like my worst synapses fire and burst got the whole crew with me about to deal damage you know we ain\'t average I ain\'t gonna say this again but this is my time better look in my eyes I\'m a genius in disguise wear my heart on my sleeve and you forced to oblige to a king in his prime everybody get in line sit back watch the stars align I finesse like my life on the line was a diamond in the rough and now I shine','GIANTS',5);
/*!40000 ALTER TABLE `canzoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow` (
  `username` varchar(100) NOT NULL,
  `friend` varchar(100) NOT NULL,
  PRIMARY KEY (`username`,`friend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow`
--

LOCK TABLES `follow` WRITE;
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistiche`
--

DROP TABLE IF EXISTS `statistiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistiche` (
  `username` varchar(100) NOT NULL,
  `allenamenti` int(100) NOT NULL,
  `corrette` int(100) NOT NULL,
  `errate` int(100) NOT NULL,
  `iscrizione` date NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistiche`
--

LOCK TABLES `statistiche` WRITE;
/*!40000 ALTER TABLE `statistiche` DISABLE KEYS */;
INSERT INTO `statistiche` VALUES ('admin',0,0,0,'2020-03-01'),('Alessandro',0,0,0,'2020-03-01'),('Alessia',0,0,0,'2020-03-01'),('Alessio',0,0,0,'2020-03-01'),('Alex',0,0,0,'2020-03-01'),('Alice',0,0,0,'2020-03-01'),('Andrea',0,0,0,'2020-03-01'),('Angela',0,0,0,'2020-03-01'),('Antonio',0,0,0,'2020-03-01'),('Aurora',0,0,0,'2020-03-01'),('Camilla',0,0,0,'2020-03-01'),('Carlotta',0,0,0,'2020-03-01'),('Davide',0,0,0,'2020-03-01'),('Edoardo',0,0,0,'2020-03-01'),('Francesco',0,0,0,'2020-03-01'),('Giacomo',0,0,0,'2020-03-01'),('Gianni',0,0,0,'2020-03-01'),('Gioacchino',0,0,0,'2020-03-01'),('Giovanni',0,0,0,'2020-03-01'),('Giuseppe',0,0,0,'2020-03-01'),('Ilaria',0,0,0,'2020-03-01'),('Leonardo',0,0,0,'2020-03-01'),('Luca',0,0,0,'2020-03-01'),('Luigi',0,0,0,'2020-03-01'),('Manuel',0,0,0,'2020-03-01'),('Marco',0,0,0,'2020-03-01'),('Mario',0,0,0,'2020-03-01'),('Matteo',0,0,0,'2020-03-01'),('Mattia',0,0,0,'2020-03-01'),('Patrizia',0,0,0,'2020-03-01'),('Raffaele',0,0,0,'2020-03-01'),('Rosa',0,0,0,'2020-03-01'),('Salvatore',0,0,0,'2020-03-01'),('Sandra',0,0,0,'2020-03-01'),('Simone',0,0,0,'2020-03-01'),('Stefano',0,0,0,'2020-03-01'),('Tommaso',0,0,0,'2020-03-01');
/*!40000 ALTER TABLE `statistiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES ('admin','admin','admin','admin','admin@admin.it'),('Alessandro','ciao','ciao','ciao','prova@prova13.it'),('Alessia','ciao','ciao','ciao','prova@prova18.it'),('Alessio','ciao','ciao','ciao','prova@prova19.it'),('Alex','ciao','ciao','ciao','prova@prova6.it'),('Alice','ciao','ciao','ciao','prova@prova2.it'),('Andrea','ciao','ciao','ciao','prova@prova33.it'),('Angela','ciao','ciao','ciao','prova@prova4.it'),('Antonio','ciao','ciao','ciao','prova@prova14.it'),('Aurora','ciao','ciao','ciao','prova@prova27.it'),('Camilla','ciao','ciao','ciao','prova@prova28.it'),('Carlotta','ciao','ciao','ciao','prova@prova11.it'),('Davide','ciao','ciao','ciao','prova@prova7.it'),('Edoardo','ciao','ciao','ciao','prova@prova1.it'),('Francesco','ciao','ciao','ciao','prova@prova9.it'),('Giacomo','ciao','ciao','ciao','prova@prova29.it'),('Gianni','ciao','ciao','ciao','prova@prova21.it'),('Gioacchino','ciao','ciao','ciao','prova@prova24.it'),('Giovanni','ciao','ciao','ciao','prova@prova32.it'),('Giuseppe','ciao','ciao','ciao','prova@prova15.it'),('Ilaria','ciao','ciao','ciao','prova@prova31.it'),('Leonardo','ciao','ciao','ciao','prova@prova25.it'),('Luca','Luca','Luca','Rastrelli','rastrelli.luca@outlook.it'),('Luigi','ciao','ciao','ciao','prova@prova8.it'),('Manuel','ciao','ciao','ciao','prova@prova23.it'),('Marco','ciao','ciao','ciao','prova@prova30.it'),('Mario','Mario','Mario','Rastrelli','rastrelli.mario@outlook.com'),('Matteo','ciao','ciao','ciao','prova@prova26.it'),('Mattia','ciao','ciao','ciao','prova@prova0.it'),('Patrizia','ciao','ciao','ciao','prova@prova16.it'),('Raffaele','ciao','ciao','ciao','prova@prova12.it'),('Rosa','ciao','ciao','ciao','prova@prova3.it'),('Salvatore','ciao','ciao','ciao','prova@prova22.it'),('Sandra','ciao','ciao','ciao','prova@prova17.it'),('Simone','ciao','ciao','ciao','prova@prova5.it'),('Stefano','ciao','ciao','ciao','prova@prova10.it'),('Tommaso','ciao','ciao','ciao','prova@prova20.it');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-22 11:43:53
