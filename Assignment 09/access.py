import csv

class Request:
    def __init__(self, page, ip, time, browser):
        self.page = page
        self.ip = ip
        self.time = time
        self.browser = browser

    def __str__(self):
        message = self.ip + " : " + self.page + " : " + self.time
        return message

def getAllRequests():
    log = open("access_log.txt", "r")
    
    Requests = []

    for x in log: 
        if "mhaile" in x:
            req = x.split()
            if req[6].endswith("/"):
                Requests.append(Request("/~mhaile/index.php", req[0], req[3][1:], req[10:]))
            else: 
                Requests.append(Request(req[6], req[0], req[3][1:], req[10:]))

    return Requests

def getPageRequests(allRequests):
    pageRequests = {}
    
    for request in allRequests:
        if request.page.endswith(".php"):
            if request.page in pageRequests.keys():
                list = pageRequests[request.page]                
                list.append(request)
                pageRequests[request.page] = list
            else:
                pageRequests[request.page] = [request]
    return pageRequests

def getDateRequests(allRequests):
    dateRequests = {}
    for request in allRequests:
            if request.time.split(":")[0] in dateRequests.keys():
                list = dateRequests[request.time.split(":")[0]]                
                list.append(request)
                dateRequests[request.time.split(":")[0]] = list
            else:
                dateRequests[request.time.split(":")[0]] = [request]
    return dateRequests

def getIpRequests(allRequests):
    ipRequests = {}
    for request in allRequests:
            if request.ip in ipRequests.keys():
                list = ipRequests[request.ip]                
                list.append(request)
                ipRequests[request.ip] = list
            else:
                ipRequests[request.ip] = [request]
    return ipRequests

csvfile = open('page_access_count.csv', 'wt', newline='')
csvwriter = csv.writer(csvfile, delimiter=',')
csvwriter.writerow(["page", "count"])
for x,y in getPageRequests(getAllRequests()).items():
    csvwriter.writerow([x, len(y)])


csvfile = open('date_access_count.csv', 'wt', newline='')
csvwriter = csv.writer(csvfile, delimiter=',')
csvwriter.writerow(["date", "count"])
for x,y in getDateRequests(getAllRequests()).items():
    csvwriter.writerow([x, len(y)])


csvfile = open('ip_access_count.csv', 'wt', newline='')
csvwriter = csv.writer(csvfile, delimiter=',')
csvwriter.writerow(["IP", "count"])
for x,y in getIpRequests(getAllRequests()).items():
    csvwriter.writerow([x, len(y)])