import bs4
from urllib.request import urlopen as uReq
from bs4 import BeautifulSoup as Soup
#from __future__ import print_function
#import mysql.connector

#cnx=mysql.connector.connect(user='root',database='movie@u')
#cursor=cnx.cursor()

filename="movies.csv"
f =open(filename,"w")
headers ="movie_title,movie_year,movie_runtime,movie_genre,poster_url\n"
f.write(headers)


count=1
my_url= 'http://www.imdb.com/list/ls057823854/?sort=moviemeter,asc&st_dt=&mode=detail&page='
while count<99:
	url=my_url+str(count)
	uClient = uReq(url)
	page_html=uClient.read()
	uClient.close()
	page_soup=Soup(page_html,"html.parser")
	containers = page_soup.findAll("h3",{"class":"lister-item-header"})
	runtime=page_soup.findAll("span",{"class":"runtime"})
	genres=page_soup.findAll("span",{"class":"genre"})
	year=page_soup.findAll("span",{"class":"lister-item-year text-muted unbold"})
	#directors=page_soup.findAll("div",{"class":"lister-item-content"})
	poster_urls=page_soup.findAll("div",{"class":"lister-item-image ribbonize"})

	for container,yr,rtime,genre,poster in zip(containers,year,runtime,genres,poster_urls):
	    movie_title=container.a.text.strip()
	    movie_year=yr.text.strip()[1:-1]
	    movie_runtime=rtime.text[:-3].strip()
	    movie_genre=genre.text.strip()
	    poster_url=poster.img["src"].strip()
	    #data_movie=(movie_title,movie_year,poster_url)
	    #cursor.execute(add_movie,data_movie)
	    f.write(movie_title+", "+movie_year+", "+movie_runtime+", "+movie_genre+", "+poster_url+"\n")
	    print(movie_title+", "+movie_year+", "+movie_runtime+", "+movie_genre+", "+poster_url+"\n")
	count=count+1

f.close()


#add_movie=("INSERT INTO movies"
#	       "(movie_title, movie_year,poster_url)"
#	       "VALUES (%s, %s,%s)")
#cnx.commit()

#cursor.close()
#cnx.close()

