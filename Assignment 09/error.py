import csv

class Error:
    def __init__(self, type, date, client, page):
        self.type = type
        self.date = date
        self.client = client
        self.page = page

    def __str__(self) -> str:
        return self.type + " : " + self.date + " : " + self.client + " : " + self.page


def getAllErrors():
    log = open("error_log.txt", "r")
    
    Errors = []

    for error in log: 
        if "mhaile" in error:
            type = error.split()[5][1:-1]
            date = error.split()[1] + ":" + error.split()[2] +  ":" + error.split()[4][:-1]  + ":" + error.split()[3].split(".")[0]
            client = error.split()[9][:-1]
            page = error.split()[-1]
            Errors.append(Error(type, date, client, page))

    return Errors


def getClientErrors(allErrors):
    clientErrors = {}
    for error in allErrors:
            if error.client in clientErrors.keys():
                list = clientErrors[error.client]                
                list.append(error)
                clientErrors[error.client] = list
            else:
                clientErrors[error.client] = [error]
    return clientErrors

def getDateErrors(allErrors):
    dateErrors = {}
    for error in allErrors:
            date = ':'.join(error.date.split(":")[0:3])

            if date in dateErrors.keys():
                list = dateErrors[date]                
                list.append(error)
                dateErrors[date] = list
            else:
                dateErrors[date] = [error]

    return dateErrors

def getPageErrors(allErrors):
    pageErrors = {}
    for error in allErrors:
            if "http" not in error.page:
                continue

            if error.page in pageErrors.keys():
                list = pageErrors[error.page]
                list.append(error)
                pageErrors[error.page] = list
            else: 
                pageErrors[error.page] = [error]

    return pageErrors

def getTypeErrors(allErrors):
    typeErrors = {}
    for error in allErrors:

            if error.type in typeErrors.keys():
                list = typeErrors[error.type]
                list.append(error)
                typeErrors[error.type] = list
            else: 
                typeErrors[error.type] = [error]

    return typeErrors

csvfile = open('date_error_count.csv', 'wt', newline='')
csvwriter = csv.writer(csvfile, delimiter=',')
csvwriter.writerow(["date", "count"])
for x , y in getDateErrors(getAllErrors()).items():
    csvwriter.writerow([x, len(y)])


csvfile = open('page_error_count.csv', 'wt', newline='')
csvwriter = csv.writer(csvfile, delimiter=',')
csvwriter.writerow(["page", "count"])
for x , y in getPageErrors(getAllErrors()).items():
    csvwriter.writerow([x, len(y)])

csvfile = open('type_error_count.csv', 'wt', newline='')
csvwriter = csv.writer(csvfile, delimiter=',')
csvwriter.writerow(["type", "count"])
for x , y in getTypeErrors(getAllErrors()).items():
    csvwriter.writerow([x, len(y)])