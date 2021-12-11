
import re

def html():
    html = ""
    counter = 0
    with open("emoji-test.txt", encoding = 'utf-8') as f:
        for line in f:
            # print(line, end = '')
            line = line.split(" ")
            if len(line) > 1:
                if line[1] == "group:":
                    result = [x for x in line if x != "#" and x != "group:"]
                    result = " ".join(result)
                    result = result[:-1]
                    html_piece = '</div><div class="intercom-emoji-picker-group"><div class="intercom-emoji-picker-group-title">' + result + '</div>'
                    print(html_piece)
                    html += html_piece
                for word in line:
                    if word == "fully-qualified":
                        counter += 1
                        title = ""
                        add_w = False
                        for w in line:
                            if add_w:
                                w_alfa = re.sub('[^A-Za-z0-9]', "", w)
                                title = title + "_" + w_alfa
                            if len(w) > 1:
                                # if w[0] == "E":
                                if "." in w:
                                    add_w = True
                        title = title[1:]
                        result = line[0]
                        if len(result) < 2:
                            continue
                        html_span = '<span class="intercom-emoji-picker-emoji" title="' + title + '">&#x' + result + ';</span>'
                        # print(line)
                        # print(html_span)
                        html += html_span
    
    html = html[6:]
    html += '</div>'

    return html

def save():
    myhtml = html()
    with open('myhtml.txt', 'w') as f:
        f.write(myhtml)

            # print(line)
    # print(html)


# def get_rid(line_list, positions):


def main():
    print(html())
    save()


if __name__ == "__main__":
    main()

