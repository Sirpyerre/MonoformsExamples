package main

import (
	"fmt"
	"io"
	"io/ioutil"
	"log"
	"net/url"
	"os"
	"path/filepath"
	"strings"
)

//Read file with path images
const fileImages = "/home/peter/currentImg.txt"
const sourceDirImg = "/home/peter/proyectos/monoforms8/web/sites/default/files/"
const destinationPictures = "/home/peter/Imágenes/monoformsUsed/"


func main() {
	fmt.Println("Init")

	data, err :=ioutil.ReadFile(fileImages)

	if err != nil {
		fmt.Println("Error reading file", err)
	} else {
		dataAsLines := strings.Split(string(data), "\n")
		count := 0
		for _, pathImg := range dataAsLines {
			if !strings.HasPrefix(pathImg, "http") {
				imgName := filepath.Base(pathImg)
				decodeImageName, err := url.QueryUnescape(imgName)
				if err != nil{
					fmt.Println("Unescape error", err)
				}

				fullPath := sourceDirImg+decodeImageName

				if Exist(fullPath){

					sourceFile, err := os.Open(fullPath)
					if err != nil {
						log.Fatal(err)
					}
					defer sourceFile.Close()

					// Create new file
					newPathName := destinationPictures+decodeImageName
					newFile, err := os.Create(newPathName)
					if err != nil {
						log.Fatal(err)
					}
					defer newFile.Close()

					bytesCopied, err := io.Copy(newFile, sourceFile)
					if err != nil {
						log.Fatal(err)
					}
					log.Printf("Copied %d bytes.", bytesCopied)
					count ++
				}
			}
		}

		fmt.Println("Counting objects:", count)
	}
}

func Exist(filename string) bool {
	info, err := os.Stat(filename)
	if os.IsNotExist(err){
		return false
	}

	return !info.IsDir()
}