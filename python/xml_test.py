from xml.dom import minidom
#dl = minidom.parse('./testdata/t.xml')
dl = minidom.parse('d:/wcq.xml')

print(dl.firstChild.toxml())

