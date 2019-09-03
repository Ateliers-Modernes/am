/* 
* Generated by
* 
*      _____ _          __  __      _     _
*     / ____| |        / _|/ _|    | |   | |
*    | (___ | | ____ _| |_| |_ ___ | | __| | ___ _ __
*     \___ \| |/ / _` |  _|  _/ _ \| |/ _` |/ _ \ '__|
*     ____) |   < (_| | | | || (_) | | (_| |  __/ |
*    |_____/|_|\_\__,_|_| |_| \___/|_|\__,_|\___|_|
*
* The code generator that works in many programming languages
*
*			https://www.skaffolder.com
*
*
* You can generate the code from the command-line
*       https://npmjs.com/package/skaffolder-cli
*
*       npm install -g skaffodler-cli
*
*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
*
* To remove this comment please upgrade your plan here: 
*      https://app.skaffolder.com/#!/upgrade
*
* Or get up to 70% discount sharing your unique link:
*       https://app.skaffolder.com/#!/register?friend=5c126fc2803b9c6fca3d3509
*
* You will get 10% discount for each one of your friends
* 
*/
// Import Libraries
import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';
import { ActivatedRoute } from '@angular/router';
// Import Services
import { ContactService } from '../../services/contact.service';
// Import Models
import { Contact } from '../../domain/am_db/contact';

// START - USED SERVICES
/**
* contactService.create
*	@description CRUD ACTION create
*
* contactService.get
*	@description CRUD ACTION get
*	@param ObjectId id Id 
*
* contactService.update
*	@description CRUD ACTION update
*	@param ObjectId id Id
*
*/
// END - USED SERVICES

/**
 * This component allows to edit a Contact
 */
@Component({
    selector: 'app-contact-edit',
    templateUrl: 'contact-edit.component.html',
    styleUrls: ['contact-edit.component.css']
})
export class ContactEditComponent implements OnInit {
    item: Contact;
    model: Contact;
    formValid: Boolean;

    constructor(
    private contactService: ContactService,
    private route: ActivatedRoute,
    private location: Location) {
        // Init item
        this.item = new Contact();
    }

    /**
     * Init
     */
    ngOnInit() {
        this.route.params.subscribe(param => {
            const id: string = param['id'];
            if (id !== 'new') {
                this.contactService.get(id).subscribe(item => this.item = item);
            }
            // Get relations
        });
    }


    /**
     * Save Contact
     *
     * @param {boolean} formValid Form validity check
     * @param Contact item Contact to save
     */
    save(formValid: boolean, item: Contact): void {
        this.formValid = formValid;
        if (formValid) {
            if (item._id) {
                this.contactService.update(item).subscribe(data => this.goBack());
            } else {
                this.contactService.create(item).subscribe(data => this.goBack());
            } 
        }
    }

    /**
     * Go Back
     */
    goBack(): void {
        this.location.back();
    }


}



