all:
	npm run serve
build:
	npm run build
jar:
	[ -e bin/META-INF/ ] || mkdir bin/META-INF
	echo "Manifest-Version: 1.0" > bin/META-INF/MANIFEST.MF
	echo "Created-By: 18.0.1.1 (Homebrew)" >> bin/META-INF/MANIFEST.MF
	echo "Main-Class: PhyCC" >> bin/META-INF/MANIFEST.MF
	cd bin && jar -cmvf META-INF/MANIFEST.MF ../PhyCC.jar *.class
