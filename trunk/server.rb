#!/usr/bin/env ruby
require 'rubygems'
require 'sqlite3'

puts "What do you want to do ?"
choix = ""
pid = 0
while ((choix = gets.chomp) && (choix != "exit"))
	if (choix != "exit")	
		
		if (choix == "run")
			if pid > 0 then
				puts ("-> Erreur: Server already run")
			else
				pid = spawn 'ruby main.rb'
				puts "-> Server runned"
			end
		elsif (choix == "reload")
			if pid > 0 then
				Process.kill(9,pid)
				pid = spawn 'ruby main.rb'
	   			puts ("-> Server reloaded")
		   	end
		elsif (choix == "quit") 
			if pid > 0 then
				Process.kill(9,pid)
				puts "-> Server closed"
			end
		elsif (choix == "stats")
			db = SQLite3::Database.new('VolcanoFTP.sqlite')     
			results = db.execute("SELECT * FROM connexion")
			puts "\nConnected at :"   
			results.each{|row| puts row.join(' => ')}
			results = db.execute("SELECT * FROM connexionTime")
			puts "\nConnexion Time :"
			results.each{|row| puts row.join(' => ')}
			results = db.execute("SELECT * FROM fileSize")
			puts "\nSize of transfered file :"
			results.each{|row| puts row.join(' => ')}
			results = db.execute("SELECT * FROM nbrFile")
			puts "\nNumber of transfered files :\n"
			results.each{|row| puts row.join(' => ')}
			puts "\n"
			db.close
		else (choix != "exit")
        	puts ("Invalid command")
    	end
	end
	puts "What do you want to do ?"	
end
puts "-> Goodbye, thank you for using Volcano FTP"